<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
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
  */
  public function index()
  {
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      $data['themes'] = DB::table('themes')->limit(6)
      ->get();
      $data['themesAll'] = DB::table('themes')
      ->get();
      $data['quantity'] = '';
      $data['name'] = '';
      $data['dname'] = '';
      $data['email'] = '';
      $data['message'] = '';
      $data['giftcard'] = '';
      $data['amount'] = '500';
      $data['edit'] = '';
      $data['id'] = '';
      $data['sender'] = '';
      $data['address'] = '';
      $data['mobile'] = '';
      // dd($data);
      return view('details',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      $data3['themes'] = DB::table('themes')->limit(6)
      ->get();
      $data3['themesAll'] = DB::table('themes')
      ->get();
      if (session()->exists('cart')){
        $data3['quantity'] = '';
        $data3['id'] = '';
        $data3['name'] = '';
        $data3['dname'] = '';
        $data3['email'] = '';
        $data3['message'] = '';
        $data3['giftcard'] = '';
        $data3['amount'] = '500';
        $data3['edit'] = '';
        $data3['sender'] = '';
        $data3['address'] = '';
        $data3['mobile'] = '';
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
  /**
  * Store to Cart.
  */
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
  * Confirmation Page.
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
  * Store to Transaction table from Cart and process Payment.
  */
  public function transaction(Request $request)
  {
    return view('errors.construction');
    // $user = Auth::user();
    // $data1 = [
    //   'name' => $request->name,
    //   'bot_name' => "GiftCard",
    //   'bot_alias' => "GiftCard",
    //   'email' => $request->email,
    //   'contact' => $request->mobile,
    //   'amount' => $request->total,
    //   'payment_method' => 'credit_card',
    //   'product_title' => 'Gift Card',
    //   'page_access_token' => $request->_token,
    //   'scoped_id' => str_random(25),
    //   'item_code' => "",
    // ];
    //
    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://igaw1ooqk0.execute-api.us-east-1.amazonaws.com/test/ipay88/ipay88-handler",
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30000,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => json_encode($data1),
    //   CURLOPT_HTTPHEADER => array(
    //     // Set here required headers
    //     "accept: */*",
    //     "accept-language: en-US,en;q=0.8",
    //     "content-type: application/json",
    //   ),
    // ));
    //
    // $response = curl_exec($curl);
    // $res = json_decode($response);
    // $err = curl_error($curl);
    // curl_close($curl);
    // if ($err) {
    //   echo "cURL Error #:" . $err;
    // } else {
    //   if ($user){
    //     $data['address'] = $request->Address;
    //     $data['state'] = $request->state;
    //     $data['city'] = $request->city;
    //     $data['refnum'] = str_random(25);
    //     $data['name'] = $request->name;
    //     $data['dname'] = $request->dname;
    //     $data['amount'] = $request->total;
    //     $data['email'] = $request->email;
    //     $data['user_id'] = $user->id;
    //     $data['total'] = $request->total;
    //     $data['status'] = $request->status;
    //     Transaction::create($data);
    //     // delete all data from cart
    //     $data['cart'] = DB::table('cart')
    //     ->where('user_id', $user->id)
    //     ->delete();
    //   }else{
    //     //for guest
    //     $data['address'] = $request->Address;
    //     $data['state'] = $request->state;
    //     $data['city'] = $request->city;
    //     $data['refnum'] = str_random(25);
    //     $data['name'] = $request->name;
    //     $data['dname'] = $request->dname;
    //     $data['email'] =$request->email;
    //     $data['user_id'] = 0;
    //     $data['total'] = $request->total;
    //     $data['status'] = $request->status;
    //     Transaction::create($data);
    //     // delete all data from cart
    //     // session()->flush('cart');
    //   }
    //   return redirect('https://igaw1ooqk0.execute-api.us-east-1.amazonaws.com/test/ipay88'.$res->payment_url);
    // }
  }

  public function success()
  {
    return view('success');
    // if ($user){
    //   $data['address'] = $request->Address;
    //   $data['state'] = $request->state;
    //   $data['city'] = $request->city;
    //   $data['refnum'] = str_random(25);
    //   $data['name'] = $request->name;
    //   $data['amount'] = $request->total;
    //   $data['email'] = $request->email;
    //   $data['user_id'] = $user->id;
    //   $data['total'] = $request->total;
    //   Transaction::create($data);
    //   // delete all data from cart
    //   $data['cart'] = DB::table('cart')
    //   ->where('user_id', $user->id)
    //   ->delete();
    // }else{
    //   //for guest
    //   $data['address'] = $request->Address;
    //   $data['state'] = $request->state;
    //   $data['city'] = $request->city;
    //   $data['refnum'] = str_random(25);
    //   $data['name'] = $request->name;
    //   $data['email'] =$request->email;
    //   $data['user_id'] = 0;
    //   $data['total'] = $request->total;
    //   Transaction::create($data);
    //   // delete all data from cart
    //   session()->flush('cart');
    // }
  }

  /**
  * Checkout Page.
  */
  public function checkout()
  {
    //for logged on user
    $user = Auth::user();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
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
          $data['items'] =$data2;
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
  * Update Cart Item Page.
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
      $data['themes'] = DB::table('themes')->limit(6)
      ->get();
      $data['themesAll'] = DB::table('themes')
      ->get();
      $data['quantity'] = $data['item']->quantity;
      $data['name'] = $data['item']->name;
      $data['dname'] = $data['item']->dname;
      $data['email'] = $data['item']->email;
      $data['message'] = $data['item']->message;
      $data['giftcard'] = $data['item']->giftcard;
      $data['amount'] = $data['item']->amount;
      $data['sender'] = $data['item']->sender;
      $data['address'] = $data['item']->address;
      $data['mobile'] = $data['item']->mobile;
      $data['edit'] = 'edit';
      $data['id'] = $id;

      return view('details',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      $data3['themes'] = DB::table('themes')
      ->limit(6)
      ->get();
      $data3['themesAll'] = DB::table('themes')
      ->get();
      if (session()->exists('cart')){
        if (!empty($data2)){

          foreach ($data2 as $key => $value){
            if($value['id'] == $id){
              $data3['quantity'] = $value['quantity'];
              $data3['name'] = $value['name'];
              $data3['dname'] = $value['dname'];
              $data3['email'] = $value['email'];
              $data3['message'] = $value['message'];
              $data3['giftcard'] = $value['giftcard'];
              $data3['amount'] = $value['amount'];
              $data3['edit'] = 'edit';
              $data3['id'] = $id;
              $data3['sender'] =$value['sender'];
              $data3['address'] = $value['address'];
              $data3['mobile'] = $value['mobile'];
            }
          }
          $data['cart'] =$data;
          $array = array_merge($data, $data3);
          return view('details',$array);
        }else{
          return view('details');
        }
      }else{
        return view('details');
      }
    }
  }


  /**
  * Update Cart Item Functionality.
  */
  public function update(Request $request)
  {
    $data['edit'] = 'edit';
    $request->total = $request->quantity*$request->amount; //get total amount per item
    $input      = $request->except(['_token','submitbutton']);
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
      $data2 = session()->get('cart.items');
      foreach ($data2 as $key => $value){
        if($value['id'] == $input['id']){
          session()->pull('cart.items.'. $key); //get selected cart item
          session()->forget('cart.items.'. $key); //delete selected cart item
          session()->save(); //save cart
        }
      }
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
      case 'update':
      return back()->with('success', 'Updated Cart Item Succesfully!'); //Update Cart
      break;
      case 'update_cart':
      return redirect('/confirm'); //Update and Checkout
      break;
    }
  }

  /**
  * Clear Cart Function.
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
      $data2 = session()->get('cart.items');
      foreach ($data2 as $key => $value){
        if($value['id'] == $id){
          session()->pull('cart.items.'. $key);
          session()->forget('cart.items.'. $key);
          session()->save();
        }
      }
    }
    return redirect('/card/details')->with('success', 'Removed Item From Cart!');
  }

  public function index2()
  {
    //for logged on user
    $user = Auth::user();

    if ($user){
      $data['themes'] = DB::table('themes')
      ->get(); //get all data from db table.themes
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
      $data['themes'] = DB::table('themes')->limit(6)
      ->get();
      $data['themesAll'] = DB::table('themes')
      ->get();
      $data['quantity'] = '';
      $data['name'] = '';
      $data['dname'] = '';
      $data['email'] = '';
      $data['message'] = '';
      $data['giftcard'] = '';
      $data['amount'] = '500';
      $data['edit'] = '';
      $data['id'] = '';
      $data['sender'] = '';
      $data['address'] = '';
      $data['mobile'] = '';
      return view('details2',$data);
    }else{
      //for guest
      $data = session()->get('cart');
      $data2 = session()->get('cart.items');
      $data3['themes'] = DB::table('themes')
      ->get(); //get all data from db table.themes
      $data3['themesAll'] = DB::table('themes')
      ->get();
      if (session()->exists('cart')){
        $data3['quantity'] = '';
        $data3['id'] = '';
        $data3['name'] = '';
        $data3['dname'] = '';
        $data3['email'] = '';
        $data3['message'] = '';
        $data3['giftcard'] = '';
        $data3['amount'] = '500';
        $data3['edit'] = '';
        $data3['sender'] = '';
        $data3['address'] = '';
        $data3['mobile'] = '';
        if (!empty($data2)){
          $data['cart'] =$data;
          $array = array_merge($data, $data3);
          return view('details2',$array);
        }else{
          return view('details2',$data3);
        }
      }else{
        return view('details2',$data);
      }
    }
  }
}
