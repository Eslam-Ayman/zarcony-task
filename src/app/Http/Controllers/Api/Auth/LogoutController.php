<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        if (!auth()->check())
            return errorMessage('Unauthenticated', 401);

        $request->user()->token()->revoke();

        return successMessage('Successfully logged out', 200);
    }
}