<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //Register Api(post ,formatdata)
    //DATA VALIDATION  //Register Api(post ,formatdata)
    public function register(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "email" => "required |email|unique:users",
                "password" => "required|confirmed"
            ]
        );

        //data save
        User::created([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        //Response
        return response()->json([
            "status" => true,
            "message" => "User created successsfuly",
        ]);
    }
    //login api (post ,formatdata)
    public function login(Request $request)
    {
        //data validation
        $request->validate(
            [
                "email" => "required|email",
                "password" => "required"
            ]
        );
        //JWTAuth and attempt
        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if (!empty($token)) {
            //Respons
            return response([
                "status" => true,
                "message" => "User logged in successfully",
                "token" => $token
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Invalid Login details"
        ]);
    }
    public function protectedEndpoint()
    {
        // Logic for protected endpoint
        return response()->json([
            'status' => true,
            'message' => 'This is a protected endpoint'
        ]);
    }
}
