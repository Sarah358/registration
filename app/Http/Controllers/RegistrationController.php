<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;

class RegistrationController extends Controller
{
    function show(){
        return view('registration');
    }
    public function register(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|',
            'confirm_password' => 'required|same:password|min:3'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/success');
    }
}
