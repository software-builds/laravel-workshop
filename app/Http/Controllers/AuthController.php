<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email|required',
            'password' => 'required|string|min:6'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if (User::where('email', $input['email'])->doesntExist()) {
            $user = User::create($input);
            $accessToken = $user->createToken('authToken')->accessToken;
            return response(['sucess' => !!$accessToken, 'access_token' => $accessToken]);
        } else {
            return response(['status' => false, 'message' => 'User already exists']);
        }

        return response(['sucess' => false, 'message' => 'Error']);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|string|min:6'
        ]);

        $input = $request->all();

        if (!auth()->attempt($input)) {
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['success' => true, 'access_token' => $accessToken]);
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return response(['message' => 'Successfully logged out']);
    }
}
