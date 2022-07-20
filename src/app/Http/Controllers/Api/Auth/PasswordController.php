<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Requests\Auth\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class PasswordController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email|max:255|exists:users,email'
        ]);

        /*$digits = 4;
        $verificationCode = rand(pow(10, $digits-1), pow(10, $digits)-1);*/

        do{
        	$verificationCode = rand(0000, 9999);

        }while ( Cache::has($verificationCode) );

        try {
        	// Cache::flush();
        	// 300 = 5 minutes = now()->addMinutes(5)
        	$user = Cache::remember($verificationCode, 300, function () { 
			    return User::where('email', request()->email)->first();
			});

            \Mail::raw('this is verification code ' . $verificationCode . ' will expire in 5 minutes', 
	            function ($message) use ($user) {
	                $message->from(config('mail.from.address'), config('mail.from.name'));
	                $message->to($user->email, $user->name);
	                $message->subject('Verification Code');
	            });
        } catch (\Exception $e) {
        	throw $e;
        }

        return successMessage('Done!', 200);
    }

    public function resetPassword(Request $request)
    {
    	$request->validate([
    		'verification_code' => 'required|numeric|min:0|digits:4',
    		'password' => 'required|string|min:8|confirmed'
        ]);

    	if ( ! $user = Cache::pull($request->verification_code) )
    		return entityNotFound();

    	$user->update(['password' => \Hash::make($request->password)]);

    	return successMessage('Password Updated!', 200);
    }

    public function changePassword(Request $request)
    {
    	$request->validate([
    		'current_password' => 'required|string|min:8|password',
    		'password' => 'required|string|min:8|confirmed',
        ]);

        auth()->user()->update(['password' => \Hash::make($request->password)]);

    	return successMessage('Password Updated!', 200);
    }
}