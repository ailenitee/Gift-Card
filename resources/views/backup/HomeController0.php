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
    $data['brand'] = DB::table('brand')
    ->get();
    // dd($data);
    return view('brand',$data);
  }
  public function giftcard()
  {
    // TODO: logged in or guest
    $user = Auth::user();
    if ($user){

    }else{
      $data['name'] = '';
    }

    $var = preg_split("/\//", $this->url->current());
    $new = str_replace('%20', ' ', $var[5]);
    $fword = explode(' ' ,$new);
    $data['fword'] = explode(' ' ,$fword[0]);
    $data['brand'] = DB::table('brand')
    ->where('brand', $new)
    ->get();
    foreach ($data['brand'] as $key => $value){
      $data['brand_id'] = $value->id;
      $denum = explode(',' ,$value->themes);

    }
    $count = count($denum);
    // foreach ($data['brand']  as $key => $value){
    // for($i =0;$i<$count;$i++){
      foreach ($denum  as $key => $value){
        // dd($value);
          // dd($key);
          //   if($i == 0){
           $data['intval']= (int)$value;
            $data['denum'][] = DB::table('themes')
            ->where('id',$value)
            ->get();
        //   }else{
        //     $data['denum'][] = DB::table('themes')
        //     ->join('denomination', 'denomination.id', '=', 'themes.denomination_id')
        //     ->where('themes.id',(int)$value[$i])
        //     ->get();
        //   }
        // }
      // }
    }
    // dd($count);
    // for($i =0;$i<$count;$i++){
    //   if($i == 0){
    //     $data['denum'][] = DB::table('denomination')
    //     ->where('id',(int)$denum[0])
    //     ->get();
    //   }else{
    //     $data['denum'][] = DB::table('denomination')
    //     ->where('id',(int)$denum[$i])
    //     ->get();
    //   }
    // }
    dd($data);
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
