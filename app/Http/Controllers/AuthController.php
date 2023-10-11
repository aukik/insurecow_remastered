<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

//must notice

class AuthController extends Controller
{
    public function user()
    {
        return Auth::user();
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password'))
        ]);

        return $user;
    }

    public function login(Request $request)
    {

        $phoneOrEmail = $request->input('phone_or_email');
        $password = $request->input('password');

        if (filter_var($phoneOrEmail, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $phoneOrEmail, 'password' => $password];
        } else {
            $credentials = ['phone' => $phoneOrEmail, 'password' => $password];
        }

        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Invalid Credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }


        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24); //1day
        return response([
            'token' => $token,
            'user' => $user,
        ])->withCookie($cookie);

    }


    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }

}
