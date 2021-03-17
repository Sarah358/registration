<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    // show the form
      function login(){
          return view('login');
      }

      public function dologin(Request $request){
// process the form
//  validate the info create rules for the inputs
$rules= array(
    // 'name' => 'required|unique:users,name',
    'name'=> 'required',
    'email'=>'required|email',
    'password'=>'required|min:3'
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

//if validator fails returnback to the login form
if ($validator->fails()) {
    return redirect('/login')
    ->withErrors($validator) // send back all errors to the login form
    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
}else {
    // create our user data for authentication
    $userdata = array(
        'name'     => Input::get('name'),
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
    );
    //remember me 
    $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
}
   //attempt to do login
   if (Auth::attempt($userdata, $remember_me)) {

    
       // validation successful!
        // redirect them to the secure section or whatever
        return redirect('/success');
        // for now we'll just echo success (even though echoing in a controller is bad)
        // echo 'SUCCESS!';

   }else {
        // validation not successful, send back to form 
        // return an error message
        return back()->withErrors([
            'message' => 'Wrong login details, please try again']);
        
            

   }
   


      }
      function success()
      {
          return view('success');
      }
      function logout()
      {
          Auth::logout();
          return redirect('/login');
      }
}
