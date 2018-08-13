<?php

namespace App\Http\Controllers;

use App\Cart;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class CardController extends Controller
{
  public function __construct(){
    // $this->cart = $cart;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user = Auth::user();

    if ($user){
      $data['cartItems'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get();
      return view('details',$data);
    }else{
      echo 'not logged in';
    }

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    if ($request->user_id != '0'){
      // $this->validate($request, [
      //   'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      // ]);
      // $image = $request->file('image');
      // $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
      // $destinationPath = public_path('/img/uploads');
      // $image->move($destinationPath, $input['imagename']);
      // $this->postImage->add($input);

      $request->total = $request->quantity*$request->amount;
      $input      = $request->except(['_token']);
      $input['total'] = $request->total;
      $messages   = [
        'required' => 'The :attribute is required',
      ];
      Cart::create($input);
      return back()->with('success', 'Added to Cart Succesfully!');
    }
    else{
      return back()->with('success', 'Not logged in!');
    }

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
