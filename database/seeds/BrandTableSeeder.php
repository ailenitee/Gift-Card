<?php

use Illuminate\Database\Seeder;
use App\Brand;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
        [
          'brand'				          => 'Mercury Drug',
          'denomination'					=> '1,2',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/mercurydrug.jpg'
        ],
        [
          'brand'				          => 'National Bookstore',
          'denomination'					=> '1,2',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/national.png'
        ],
        [
          'brand'				          => 'Uniqlo',
          'denomination'					=> '2,3',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/uniqlo.png'
        ],
        [
          'brand'				          => 'SM Supermarket',
          'denomination'					=> '2,3',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/supermarket.png'
        ],
        [
          'brand'				          => 'Jollibee',
          'denomination'					=> '2,3,4',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/jollibee.png'
        ],
        [
          'brand'				          => 'Bench',
          'denomination'					=> '2,3',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/bench.png'
        ],
        [
          'brand'				          => 'Ace Hardware',
          'denomination'					=> '1,2',
          'logo'					        => url()->current().'/img/partners/AceHardware.png'
        ],
        [
          'brand'				          => 'Beauty Manila',
          'denomination'					=> '1,2',
          'logo'					        => url()->current().'/img/partners/beautymnl.png'
        ],
        [
          'brand'				          => 'Ever Bilena',
          'denomination'					=> '1,2',
          'logo'					        => url()->current().'/img/partners/EverBilena.png'
        ],
        [
          'brand'				          => 'Shakeys',
          'denomination'					=> '1,2',
          'logo'					        => url()->current().'/img/partners/Shakeys.png'
        ],
        [
          'brand'				          => 'Toy Kingdom',
          'denomination'					=> '1,2',
          'logo'					        => url()->current().'/img/partners/toykingdom.png'
        ],
        [
          'brand'				          => 'True Value',
          'denomination'					=> '1,2',
          'logo'					        => url()->current().'/img/partners/TrueValue.png'
        ]
      ];
      foreach ($data as $key)
      {
        Brand::create([
          'brand'                => $key['brand'],
          'denomination'         => $key['denomination'],
          'logo'                 => $key['logo']
        ]);
      }
    }
}
