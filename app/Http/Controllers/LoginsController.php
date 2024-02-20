<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    public static function index() {
        return view('logins.login', [
            "title" => "Starbucks",
        ]);
    }

    public function authenticate(Request $request){
        $cred = $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($cred)){
            $request->session()->regenerate();
            return redirect('/home');
        }
        return back()->with('success','Login Failed! Try Again');
    }
    public function logout( ){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/logins/login');
    }
}
