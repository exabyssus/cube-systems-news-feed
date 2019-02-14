<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function verifyEmail(Request $request, string $email)
    {
        // Add query parameter email to request
        $request->request->add(['email' => $email]);

        // Validate email using laravel native request params validation
        $request->validate(['email' => 'required|unique:users|email']);

        return response()->json([], 200);
    }
}
