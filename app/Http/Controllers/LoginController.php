<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticateUser;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attemp(array('email' => $input['email'], 'password'=> $input['password'])))
        {
            if(auth()->user()-roles_id ==1){
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route('login')->with('email','Email Address and Password are wrong');
        }
    }
}
