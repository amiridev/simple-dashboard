<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:6', 'exists:users,username'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        /** @var User $user */
        $user = User::where('username', $request->username)->first();
        if (Hash::check($request->password, $user->password)) {
            return [
                'access_token' => $user->createToken($user->username)->accessToken
            ];
        }

        return [
            'error' => 'کاربر یافت نشد'
        ];
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:6', 'unique:users,username'],
            'email' => ['required', 'string', 'min:6', 'unique:users,email'],
            'mobile' => ['required', 'string', 'min:6', 'unique:users,mobile'],
            'name' => ['required', 'string', 'min:6'],
            'family' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $data = $request->only(['name' , 'family' , 'username' , 'mobile' , 'email']);
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        return [
            'access_token' => $user->createToken($user->username)->accessToken,
            'user' => $user
        ];
    }

    public function userInfo()
    {
        $user = auth()->user();
        return [
            'user' => $user
        ];
    }
}
