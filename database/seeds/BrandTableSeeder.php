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
          'themes'				      	=> '22,23,1',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/mercurydrug.jpg'
        ],
        [
          'brand'				          => 'National Bookstore',
          'themes'					      => '3,4,5,6,7',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/national.png'
        ],
        [
          'brand'				          => 'Uniqlo',
          'themes'				      	=> '2,3,8',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/uniqlo.png'
        ],
        [
          'brand'				          => 'SM Supermarket',
          'themes'					      => '1,2,3',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/supermarket.png'
        ],
        [
          'brand'				          => 'Jollibee',
          'themes'					      => '2,5,9,10',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/jollibee.png'
        ],
        [
          'brand'				          => 'Bench',
          'themes'					      => '1,2,3,4,5',
          'logo'					        => 'https://s3.amazonaws.com/smgiftcard/images/thumbnails/bench.png'
        ],
        [
          'brand'				          => 'Ace Hardware',
          'themes'					      => '8,9,11,12',
          'logo'					        => url()->current().'/img/partners/AceHardware.png'
        ],
        [
          'brand'				          => 'Beauty Manila',
          'themes'					      => '1,2',
          'logo'					        => url()->current().'/img/partners/beautymnl.png'
        ],
        [
          'brand'				          => 'Ever Bilena',
          'themes'					      => '1,2',
          'logo'					        => url()->current().'/img/partners/EverBilena.png'
        ],
        [
          'brand'				          => 'Shakeys',
          'themes'				       	=> '1,2',
          'logo'					        => url()->current().'/img/partners/Shakeys.png'
        ],
        [
          'brand'				          => 'Toy Kingdom',
          'themes'					      => '1,2',
          'logo'					        => url()->current().'/img/partners/toykingdom.png'
        ],
        [
          'brand'				          => 'True Value',
          'themes'					      => '1,2',
          'logo'					        => url()->current().'/img/partners/TrueValue.png'
        ]
      ];
      foreach ($data as $key)
      {
        Brand::create([
          'brand'                => $key['brand'],
          'themes'               => $key['themes'],
          'logo'                 => $key['logo']
        ]);
      }
    }
}
