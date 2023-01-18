<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            "email" => 'required|email',
            "password" => 'required|min:6'
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {

            $token = $user->createToken('api');
            return [
                'token' => $token->plainTextToken
            ];

        } else {
            return [
                'error' => 'Invalid Credentials'
            ];
        }
    }

    public function verify($id)
    {

        return [User::find($id)->update([
            "email_verified_at" => now()
        ]),
        
        response()->json([
            "message" => 'Email verified successfully.'
        ])];

    }

}
