<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function home(){
        return view('home');
    }
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'email empty',
            'email.email' => 'wrong email format',
            'password.required' => 'password empty',
            'password.min' => 'password to short',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $email = $request->email;
            $password = $request->password;
      if(Auth::attempt(['email'=>$email,'password'=>$password])){
          return redirect()->intended('/');
      }else{
          $errors = new MessageBag(['errorslogin'=>'email or password wrong']);
          return redirect()->back()->withInput()->withErrors($errors);
      }
        }
    }
}
