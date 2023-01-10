<?php

namespace App\Http\Controllers\Auth;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login',['dashboard' => Dashboard::where('id','1')->first()]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('error','Login Failed!');
    }

    public function logout(Request $request){
        auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
