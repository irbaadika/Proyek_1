<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->verify === 0 ){
                Auth::logout();
                return back()->with('loginError','Login Failed!!! Hubungi admin untuk verifikasi akun anda agar bisa login!');
            }
            if(auth()->user()->role == 'admin')
            return redirect()->intended('/dashboard');
            else
            return redirect()->intended('/user');
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function verify(Request $request, User $user){
      
        $user = User::find($request)->first();
        if($user){
            $user->verify = '1';
            $user->save();
        }

        return redirect('/dashboard/adminUser');
    }

    public function block(Request $request){
       
        $user = User::find($request)->first();
        if($user){
            $user->verify = '0';
            $user->save();
        }

        return redirect('/dashboard/adminUser');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
