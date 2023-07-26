<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function login_page(){
        return view('admin.loginAdmin');
    }
    public function login(Request $request){
        $info_login = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],
        [
            'email.required' => 'Trường này không được để trống.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Trường này không được để trống.',
        ]
    );
        $info_login['is_admin'] = 1;
        if (Auth::attempt($info_login)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
        return back()->withErrors([
            'email' => 'Không tồn tại email',
        ])->onlyInput('email');
    }
}
