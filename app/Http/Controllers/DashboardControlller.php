<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardControlller extends Controller
{
    public function index(){
        return view("home",[
            "title" => "SPM || Dashboard",
            "pages" => "Dashboard",
        ]);
    }
    public function indexLogin(){
        return view("login",[
            "title" => "SPM || Login",
            
        ]);
    }

    public function loginAccount(Request $request):RedirectResponse{
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->with('danger','Username / Password Salah');
    }

    public function indexRegister(){
        return view("register",[
            "title" => "SPM || Register",
            
        ]);
    }

    public function registerAccount(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $validatedData['password']=bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success','Berhasil Register');
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
