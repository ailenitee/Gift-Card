<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'username' => 'required|string|max:20|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['first_name'] + " " + $data['last_name'],
      'email' => $data['email'],
      'username' => $data['user_name'],
      'mobile' => $data['mnumber'],
      'password' => Hash::make($data['password']),
    ]);
  }

  public function register(Request $request)
  {
        $user= new \App\User;
        $user->name=$request->get('first_name');
        $user->email=$request->get('email');
        $user->username=$request->get('user_name');
        $user->mobile=$request->get('mnumber');
        $user->password=Hash::make($request->get('password'));
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $user->created_at = strtotime($format);
        $user->save();

        return redirect('/login#signup')->with('success', 'Registered Succesfully!');
  }
}
