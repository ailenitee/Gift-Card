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
    $input      = $request->except(['_token']);
    $trans_id   = $this->cart->generateTransctionID(15);
    $count = count($request->quantityVal);
    foreach ($request->themeID as $key => $value){
      $intval= (int)$value;
      $input['input'][$key]["theme_id"] = $value;
      $input['input'][$key]['transaction_id']     = $trans_id;
      $input['input'][$key]['brand_id']     = $request->brand_id;
      $input['input'][$key]['user_id']     = $request->user_id;
      $input['input'][$key]['sender']     = $request->sender;
      $input['input'][$key]['name']     = $request->sender;
      $input['input'][$key]['address']     = $request->sender;
      $input['input'][$key]['mobile']     = $request->sender;
      $input['themes'] = DB::table('denomination')
      ->leftJoin('themes', 'themes.denomination_id', '=', 'denomination.id')
      ->where('themes.id',$intval)
      ->get();
      foreach ($input['themes'] as $key3 => $value){
        $input['input'][$key]['denomination'] = (int)$value->denomination;
      }
    }
    foreach ($request->quantityVal as $key2 => $value){
      $input['input'][$key2]['quantity'] =  (int)$value;
      $input['input'][$key2]['total'] = $input['input'][$key2]['quantity'] * $input['input'][$key2]['denomination'];
    }
    foreach ($input['input'] as $key => $value){
      if($input['input'][$key]['quantity'] == 0){
        // DO NOT INSERT
        $res = [];
      }else{
        $res[] =[
          'user_id'             => (int)$input['input'][$key]['user_id'],
          'theme_id'            => (int)$input['input'][$key]['theme_id'],
          'brand_id'            => (int)$input['input'][$key]['brand_id'],
          'transaction_id'      => $input['input'][$key]['transaction_id'],
          'sender'              => $input['input'][$key]['sender'],
          'name'                => $input['input'][$key]['name'],
          'quantity'            => $input['input'][$key]['quantity'],
          'address'             => $input['input'][$key]['address'],
          // 'email'               => $input['email'],
          'mobile'              => $input['input'][$key]['mobile'],
          'total'               => $input['input'][$key]['total']
        ];
      }
    }
    if(!$res){
      switch($request->submitbutton) {
        case 'save':
        return back()->with('error', 'Please enter a Quantity');
        break;
        case 'save_cart':
        return back()->with('error', 'Please enter a Quantity');
        break;
      }
    }else{
      return $this->storeCart($res,$input,$request);
    }
  }

  public function storeCart($res,$input,$request)
  {
    if ($input['user_id'] != '0'){
      $messages   = [
        'required' => 'The :attribute is required',
      ];
      Cart::insert($res);
    }else{
      //// TODO: insert to cart for guest
      if ($request->session()->exists('cart')) {
        $request->session()->push('cart.items', $res);
      }else{
        $request->session()->put('cart.items', $res);
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
    $user = Auth::user();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get();
      foreach ($data['cart'] as $key => $value){
        // Joined cart and themes to get themes details
        $data['cartThemes'][$key] = DB::table('themes')
        ->join('cart', 'themes.id', '=', 'cart.theme_id')
        ->join('denomination', 'themes.denomination_id', '=', 'denomination.id')
        ->where('cart.theme_id', $value->theme_id)
        ->get();
      }
      return view('confirm',$data);
    }else{
      $data3 = session()->get('cart');
      $data2 = session()->get('cart.items');
      // dd($data2);
      if (session()->exists('cart')){
        if (!empty($data2)){
          $data['cart'] =$data2;
          // dd($data2);
          foreach ($data2 as $key => $value){
            foreach ($value as $key2 => $value2){
              //get theme img

              $data['cart'][$key][$key2]['themes'] = DB::table('themes')
              ->where('id', $value2['theme_id'])
              ->get();
              foreach ($data['cart'][$key][$key2]['themes'] as $value3){
                $data['cart'][$key][$key2]['themeImg'] = $value3->theme;
                $data['cart'][$key][$key2]['denomination_id'] = $value3->denomination_id;
              }
              //get denomination
              $data['cart'][$key][$key2]['denomination'] = DB::table('denomination')
              ->where('id', $data['cart'][$key][$key2]['denomination_id'])
              ->get();
              foreach ($data['cart'][$key][$key2]['denomination'] as $value4){
                $data['cart'][$key][$key2]['denomination'] = $value4->denomination;
              }

              $data['cart'][$key][$key2]['theme'] = $data['cart'][$key][$key2]['themeImg'];
              $data['cart'][$key][$key2]['denomination'] = $data['cart'][$key][$key2]['denomination'];
            }
          }
          // dd(count($key));
          return view('confirm',$data);
        }else{
          return view('confirm');
        }
      }else{
        return view('confirm');
      }
    }
    // //for logged on user
    // if ($user){
    //   $data['cart'] = DB::table('cart')
    //   ->where('user_id', $user->id)
    //   ->get(); //get all data from db table.cart based on user id
    //
    //   return view('confirm',$data);
    // }else{
    //   //for guest
    //   $data = session()->get('cart');
    //   $data2 = session()->get('cart.items');
    //   //check if existing cart in session
    //   if (session()->exists('cart')){
    //     //check if cart empty
    //     if (!empty($data2)){
    //       $data['cart'] =$data;
    //       return view('confirm',$data);
    //     }else{
    //       return view('confirm');
    //     }
    //   }else{
    //     return view('confirm');
    //   }
    // }
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
