<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Rules\Recaptcha;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Authenticatable;

    public function show()
    {
//        if(Auth::check()){
//            return redirect()->intended('dashboard');
//        }
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string', 'min:6'],
            'recaptcha' => ['required', new Recaptcha],
        ]);

        // remove recaptcha from $credentials
        unset($credentials['recaptcha']);

        /** @var Admin $admin */
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $admin->update(['login_at' => now()]);
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
