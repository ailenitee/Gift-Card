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
use Illuminate\Routing\UrlGenerator;
use App\Cart\CartItem;
use App\Cart\EasyCart;

class CardController extends Controller
{
  protected $url;

  public function __construct(UrlGenerator $url)
  {
    $this->url = $url;
    $this->cart = session('cart');
  }

  /**
  * Send a Gift Card.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cartItems'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      return view('details',$data);
    }else{
      //for guest

      $data = session()->get('cart');
      if (session()->exists('cart')){
        $data['cart'] =$data;
        // dd(session()->get('cart'));
        return view('details',$data);
      }else{
        return view('details');
      }
    }
  }
  public function store(Request $request)
  {
    $request->total = $request->quantity*$request->amount; //get total amount per item
    $input      = $request->except(['_token']);
    $input['total'] = $request->total;
    $input['id']     = $this->cart->generateTransctionID(15);
    if($request->hasFile('giftcard')){
      $messages   = [
        'image|mimes' => 'should be jpeg,png,jpg,gif,svg!',
      ];
      $imageName = time().'.'.$request->giftcard->getClientOriginalExtension(); //set a name for the image
      $request->giftcard->move(public_path('/img/uploads'), $imageName); //move the image to a folder
      $imageFile = $this->url->to('/').'/img/uploads/'.$imageName; //the full url of the image
      $input['giftcard'] = $imageFile; //new name/link of the image
    }
    //for logged on user
    if ($request->user_id != '0'){
      $messages   = [
        'required' => 'The :attribute is required',
      ];
      Cart::create($input); //insert all inputs to db
    }else{
      //for guest
      // dd(session()->all());
      if ($request->session()->exists('cart')) {
        $request->session()->push('cart.items', $input);
      }else{
        $request->session()->put('cart.items', $input);
      }
      // $this->cart->addItem(new CartItem($input,'cart'));
      // $request->session()->push('cart', $input);
    }
    $cart                       = $this->cart->getItems();
    $data['cart']               = $cart;
    if($request->type =="json"){
      return $data;
    }
    // dd($request->session()->all());
    return back()->with('success', 'Added to Cart Succesfully!');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function confirm()
  {
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cartItems'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      return view('confirm',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      if (session()->exists('cart')){
        $data['cart'] =$data;
        // dd(session()->get('cart'));
        return view('confirm',$data);
      }else{
        return view('confirm');
      }
    }
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function checkout()
  {
    return view('checkout');
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
