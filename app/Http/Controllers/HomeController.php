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
    $user = Auth::user();
    $data['brand'] = DB::table('brand')
    ->get();
    if ($user){
      $data['cart'] = DB::table('cart')
      ->where('user_id', $user->id)
      ->get();
      // dd($data);
      return view('brand',$data);
    }else{
      //for guest
      $data3 = session()->get('cart');
      $data2 = session()->get('cart.items');
      if (session()->exists('cart')){
        if (!empty($data2)){
          $data3['cart'] =$data3;
          return view('brand',$data);
        }else{
          return view('brand',$data);
        }
      }else{
        return view('brand',$data);
      }
      // return view('brand',$data);
    }
  }
  public function giftcard()
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
        }
      }
    }

    $var = preg_split("/\//", $this->url->current());
    $new = str_replace('%20', ' ', $var[5]);
    $fword = explode(' ' ,$new);
    $data['fword'] = explode(' ' ,$fword[0]);
    $data['brand'] = DB::table('brand')
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
      $data['denum'][] = DB::table('denomination')
      ->leftJoin('themes', 'themes.denomination_id', '=', 'denomination.id')
      ->where('themes.id',$intval)
      ->get();
    }
    $data['name'] = '';
    $data['intval'] = $intval;


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

}
