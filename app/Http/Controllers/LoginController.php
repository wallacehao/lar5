<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
	public function getLogin() {
		if (!Auth::check()) {
			return view('admin.module.login.login');
		} else {
			return redirect('dt_admin');
		}
	}

	public function postLogin(LoginRequest $request) {
		$login = [
			'username' => $request->txtUser, 
			'password' => $request->txtPass, 
			'level'	   => 1
		];
		if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect('dt_admin');
        } else {
        	return redirect()->back();
        }
	}

	public function getLogout() {
		Auth::logout();
		return redirect()->route('getLogin');
	}

}
