<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
    
    $data['password'] = Hash::make($data['password']);

    User::create($data);

    $request->session()->flash('success', 'Registration was Successful! Please Login!');

    return redirect('/login');
    }
}
