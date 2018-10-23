<?php

use Illuminate\Database\Seeder;
use App\Theme;
class ThemesTableSeeder extends Seeder
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
          'theme'				      => url()->current().'/img/denomination/500/Birthday_500.jpg',
          'category_id'			  => '1',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/Christmas1_500.jpg',
          'category_id'			  => '2',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/Congratulations_500.jpg',
          'category_id'			  => '3',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/ForHer_500.jpg',
          'category_id'			  => '4',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/ForHim_500.jpg',
          'category_id'			  => '5',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/Love_500.jpg',
          'category_id'			  => '6',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/GetWellSoon_500.jpg',
          'category_id'			  => '7',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/Birthday_1000.jpg',
          'category_id'			  => '1',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/Christmas1_1000.jpg',
          'category_id'			  => '2',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/Congratulations_1000.jpg',
          'category_id'			  => '3',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/ForHer_1000.jpg',
          'category_id'			  => '4',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/ForHim_1000.jpg',
          'category_id'			  => '5',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/Love_1000.jpg',
          'category_id'			  => '6',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/GetWellSoon_1000.jpg',
          'category_id'			  => '7',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/Birthday_2000.jpg',
          'category_id'			  => '1',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/Christmas1_2000.jpg',
          'category_id'			  => '2',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/Congratulations_2000.jpg',
          'category_id'			  => '3',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/ForHer_2000.jpg',
          'category_id'			  => '4',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/ForHim_2000.jpg',
          'category_id'			  => '5',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/Love_2000.jpg',
          'category_id'			  => '6',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/GetWellSoon_2000.jpg',
          'category_id'			  => '7',
          'denomination_id'   => '5'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/100/Love_100.jpg',
          'category_id'			  => '6',
          'denomination_id'   => '1'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/200/ForHer_200.jpg',
          'category_id'			  => '6',
          'denomination_id'   => '2'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/100/Love_100.jpg',
          'category_id'			  => '8',
          'denomination_id'   => '1'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/200/ForHer_200.jpg',
          'category_id'			  => '8',
          'denomination_id'   => '2'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/500/Christmas1_500.jpg',
          'category_id'			  => '8',
          'denomination_id'   => '3'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/1000/Love_1000.jpg',
          'category_id'			  => '8',
          'denomination_id'   => '4'
        ],
        [
          'theme'				      => url()->current().'/img/denomination/2000/Congratulations_2000.jpg',
          'category_id'			  => '8',
          'denomination_id'   => '5'
        ],
      ];
      foreach ($data as $key)
      {
        Theme::create([
          'theme'               => $key['theme'],
          'category_id'         => $key['category_id'],
          'denomination_id'     => $key['denomination_id']
        ]);
      }
    }
}
