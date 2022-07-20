<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Http\Resources\Auth\RegisterResource;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'password' => $request->password,
            // 'api_token' => hash('sha256', Str::random(60)),
            // 'api_token' => Str::random(60),
        ]);
        
        $authToken = $user->createToken('authToken'); // $user->api_token;

        // RegisterResource::withoutWrapping();
        return new RegisterResource($user, $authToken);
    }
}