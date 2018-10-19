<?php

namespace App\Http\Controllers\Auth;
use Input;
use Redirect;
use Auth;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use IlluminateSupportFacadesValidator;
use IlluminateFoundationBusDispatchesJobs;
use IlluminateRoutingController as BaseController;
use IlluminateFoundationValidationValidatesRequests;
use IlluminateFoundationAuthAccessAuthorizesRequests;
use IlluminateFoundationAuthAccessAuthorizesResources;
use IlluminateHtmlHtmlServiceProvider;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/brand';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|confirmed|min:6',
    ]);
  }

  public function login()
  {
    return view('login');
  }

  public function loginProcess(Request $request)
  {
    $data['user'] = DB::table('users')
    ->where('email', $request->email)
    ->first(); //get all data from db table.cart based on user id
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
      // if($data['user']->roles == 0){
      //   return redirect('/cms/dashboard');
      // }else{
      //   return redirect('/brand');
      // }
      return redirect('/brand');
    }else{
      return redirect('/login')->with('error', 'Invalid Email or Password');
    }


  }

  public function logout(){
    Auth::logout();
    return redirect('/login');
  }
}
