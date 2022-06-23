<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function register(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $coba=DB::select("INSERT INTO users(name, email, password) 
        VALUE('$name','$email','$password')");
        if(!$coba){
            return redirect()->route('login');
        }
        else{
            return redirect()->route('register');
        }
    }
}
