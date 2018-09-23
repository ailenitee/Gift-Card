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
    // for API brands
    try {
      $client = new GuzzleHttpClient();
      $apiRequest = $client->request('GET', 'https://eo2i7chdqb.execute-api.us-east-1.amazonaws.com/dev/api/templates');
      $content = json_decode($apiRequest->getBody()->getContents());
      // dd($content);
      foreach ($content as $key => $value){
        if($value->template == 'Jollibee' || $value->template == 'Max Restaurant' || $value->template == 'Shakeys' || $value->template == 'True Value' || $value->template == 'Ace Hardware' || $value->template == 'Toy Kingdom' || $value->template == 'Bench' || $value->template == 'SM Supermarket' || $value->template == 'Mercury Drug' || $value->template == 'National Bookstore' || $value->template == 'Uniqlo'){
          $data[] = array(
            'template' => $value->template,
            'denominations' => $value->denominations,
            'thumbnail' => $value->thumbnail,
          );
        }
      }
      $data_array = json_encode($data);
      $data_object['res'] = json_decode($data_array , true);
      return view('brand',$data_object);
    } catch (RequestException $re) {
    }

  }
  public function giftcard()
  {
    return view('giftcard');
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
