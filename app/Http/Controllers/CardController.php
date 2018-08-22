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
      $data['quantity'] = '';
      $data['name'] = '';
      $data['email'] = '';
      $data['message'] = '';
      $data['giftcard'] = '';
      $data['amount'] = '500';
      $data['edit'] = '';
      $data['id'] = '';
      return view('details',$data);
    }else{
      //for guest
      // dd(session()->all());
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      if (session()->exists('cart')){
        $data3['quantity'] = '';
        $data3['id'] = '';
        $data3['name'] = '';
        $data3['email'] = '';
        $data3['message'] = '';
        $data3['giftcard'] = '';
        $data3['amount'] = '500';
        $data3['edit'] = '';
        if (!empty($data2)){
          $data['cart'] =$data;
          $array = array_merge($data, $data3);
          return view('details',$array);
        }else{
          return view('details',$data3);
        }
      }else{
        return view('details',$data);
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
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //for logged on user

    $user = Auth::user();
    if ($user){
      $data['item'] = DB::table('cart')
      ->where('id', $id)
      ->first(); //get specific data to edit from db table.cart based on user id
      $data['cart'] = DB::table('cart')
      ->get(); //get all data from db table.cart based on user id
      $data['quantity'] = $data['item']->quantity;
      $data['name'] = $data['item']->name;
      $data['email'] = $data['item']->email;
      $data['message'] = $data['item']->message;
      $data['giftcard'] = $data['item']->giftcard;
      $data['amount'] = $data['item']->amount;
      $data['edit'] = 'edit';
      $data['id'] = $id;
      return view('details',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      if (session()->exists('cart')){
        if (!empty($data2)){
          $data['cart'] =$data;
          // dd($data2);
          $data['quantity'] = '';
          $data['name'] = '';
          $data['email'] = '';
          $data['message'] = '';
          $data['giftcard'] = '';
          $data['amount'] = '';
          $data['edit'] = 'edit';
          $data['id'] = '';
          return view('details',$data);
        }else{
          return view('details',$data3);
        }
      }else{
        return view('details',$data);
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
  public function update(Request $request)
  {
    $data['edit'] = 'edit';
    $request->total = $request->quantity*$request->amount; //get total amount per item
    $input      = $request->except(['_token','submitbutton','id']);
    $input['total'] = $request->total;
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
      DB::table('cart')
            ->where('id', $request->id)
            ->where('user_id', $request->user_id)
            ->update($input);
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

    switch($request->submitbutton) {
      case 'update':
      return back()->with('success', 'Updated Cart Item Succesfully!');
      break;
      case 'update_cart':
      return redirect('/confirm');
      break;
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

  public function deleteCart($id)
  {
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('id', $id)
      ->delete(); //delete data from db table.cart based on item id
    }else{
      //for guest
      // dd(session()->forget('cart.items.' . $id));
      session()->forget('cart.items.' . $id);
    }
    return back()->with('success', 'Removed Item From Cart!');
  }
}
