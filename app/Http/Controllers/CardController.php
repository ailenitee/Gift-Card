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
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      return view('details',$data);
    }else{
      //for guest
      // dd(session()->all());
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      if (session()->exists('cart')){
        if (!empty($data2)){
          $data['cart'] =$data;
          return view('details',$data);
        }else{
          return view('details');
        }
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
      if ($request->session()->exists('cart')) {
        $request->session()->push('cart.items', $input);
      }else{
        $request->session()->put('cart.items', $input);
      }
    }
    $cart                       = $this->cart->getItems();
    $data['cart']               = $cart;
    if($request->type =="json"){
      return $data;
    }
    switch($request->submitbutton) {
      case 'save':
      return back()->with('success', 'Added to Cart Succesfully!');
      break;
      case 'save_cart':
      return redirect('/confirm');
      break;
    }

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
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id

      return view('confirm',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      //check if existing cart in session
      if (session()->exists('cart')){
        //check if cart empty
        if (!empty($data2)){
          $data['cart'] =$data;
          return view('confirm',$data);
        }else{
          return view('confirm');
        }
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
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      $data['cart'] =$data['cart'];
      return view('checkout',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      //check if existing cart in session
      if (session()->exists('cart')){
        //check if cart empty
        if (!empty($data2)){
          $data['cart'] =$data;
          return view('checkout',$data);
        }else{
          return view('checkout');
        }
      }else{
        return view('checkout');
      }
    }
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function transaction()
  {
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      $data['cart'] =$data['cart'];
      return view('checkout',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      //check if existing cart in session
      if (session()->exists('cart')){
        //check if cart empty
        if (!empty($data2)){
          $data['cart'] =$data;
        }else{
        }
      }else{
      }
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function clearCart(Request $request){
    $user = Auth::user();
    if ($user){
      $data = DB::table('cart')
      ->where('user_id', $user->id)
      ->delete();
    }else{
      session()->flush('cart');
    }
    return back()->with('success', 'Cleared Cart!');
  }
}
