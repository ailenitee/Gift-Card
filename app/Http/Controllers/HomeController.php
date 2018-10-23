<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  protected $url;
  public function __construct(UrlGenerator $url)
  {
    $this->url = $url;
    $this->cart = session('cart');
  }
  public function brand() {
    // dd(session()->getId());
    $user = Auth::user();
    $data['brand'] = DB::table('brands')
    ->get();
    if ($user){
      $data['cart'] = DB::table('carts')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
    }else{
      $data['cart'] = DB::table('carts')
      ->where('user_type', 'guest')
      ->get(); //get all data from db table.cart based on user id
    }
    return view('brand',$data);
  }

  public function giftcard()
  {
    session()->getId();
    $user = Auth::user();
    if ($user){
      $data['user_id'] = $user->id;
      $data['cartThemes'] = DB::table('carts')
      ->join('themes', 'themes.id', '=', 'carts.theme_id')
      ->join('denominations', 'themes.denomination_id', '=', 'denominations.id')
      ->select('carts.*','denominations.denomination','themes.theme')
      ->where('user_id', $user->id)
      ->get(); //get all data from db table.cart based on user id
    }else{
      $data['user_id'] = session()->getId();
      $data['cartThemes'] = DB::table('carts')
      ->join('themes', 'themes.id', '=', 'carts.theme_id')
      ->join('denominations', 'themes.denomination_id', '=', 'denominations.id')
      ->select('carts.*','denominations.denomination','themes.theme')
      ->where('user_id', session()->getId())
      ->get(); //get all data from db table.cart based on user id
    }

    foreach ($data['cartThemes'] as $key => $value){
      // Joined cart and themes to get themes details
      $data['item'] = DB::table('carts')
      ->join('themes', 'themes.id', '=', 'carts.theme_id')
      ->join('denominations', 'themes.denomination_id', '=', 'denominations.id')
      ->select('carts.*','denominations.denomination','themes.theme')
      ->where('carts.theme_id', $value->theme_id)
      ->get();
    }
    // dd($data['cartThemes']);
    $var = preg_split("/\//", $this->url->current());
    $new = str_replace('%20', ' ', $var[5]);
    $fword = explode(' ' ,$new);
    $data['fword'] = explode(' ' ,$fword[0]);
    $data['brand'] = DB::table('brands')
    ->where('brand', $new)
    ->get();
    // dd($data['brand']);
    foreach ($data['brand'] as $key => $value){
      $data['brand_id'] = $value->id;
      $denum = explode(',' ,$value->themes);
    }
    $count = count($denum);
    $data['allThemes'] = $denum;
    foreach ($denum  as $key => $value){
      $intval= (int)$value;
      $data['denum'][] = DB::table('denominations')
      ->leftJoin('themes', 'themes.denomination_id', '=', 'denominations.id')
      ->where('themes.id',$intval)
      ->get();
    }
    $data['name'] = '';
    $data['edit'] = '';
    $data['address'] = '';
    $data['sender'] = '';
    $data['mobile'] = '';

    $data['intval'] = $intval;

    // dd($data);

    return view('giftcard',$data);
  }

  public function categories()
  {
    return view('categories');
  }
  public function contact()
  {
    return view('contact');
  }

  public function getCart($user){

    return $data['cartThemes'];
  }
}
