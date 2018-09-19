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
          'theme'				=> url()->current().'/img/themes/bday-1.jpg',
          'category'					=> 'birthday'
        ],
        [
          'theme'				=> url()->current().'/img/themes/bday-2.jpg',
          'category'					=> 'birthday'
        ],
        [
          'theme'				=> url()->current().'/img/themes/bday-11.jpg',
          'category'					=> 'birthday'
        ],
        [
          'theme'				=> url()->current().'/img/themes/bday-22.jpg',
          'category'					=> 'birthday'
        ],
        [
          'theme'				=> url()->current().'/img/themes/Birthday.jpg',
          'category'					=> 'birthday'
        ],
        [
          'theme'				=> url()->current().'/img/themes/Christmas1.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/Christmas2.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/xmas-3.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/XMAS-4.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/XMAS-33.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/xmas-11.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/xmas-22.jpg',
          'category'					=> 'christmas'
        ],
        [
          'theme'				=> url()->current().'/img/themes/ForHer.jpg',
          'category'					=> 'love'
        ],
        [
          'theme'				=> url()->current().'/img/themes/ForHim.jpg',
          'category'					=> 'love'
        ],
        [
          'theme'				=> url()->current().'/img/themes/Hearts.jpg',
          'category'					=> 'love'
        ],
        [
          'theme'				=> url()->current().'/img/themes/ILY.jpg',
          'category'					=> 'love'
        ],
        [
          'theme'				=> url()->current().'/img/themes/Love.jpg',
          'category'					=> 'love'
        ],
        [
          'theme'				=> url()->current().'/img/themes/generic1-1.jpg',
          'category'					=> 'generic'
        ],
        [
          'theme'				=> url()->current().'/img/themes/generic1-2.jpg',
          'category'					=> 'generic'
        ],
        [
          'theme'				=> url()->current().'/img/themes/generic1-3.jpg',
          'category'					=> 'generic'
        ],
        [
          'theme'				=> url()->current().'/img/themes/Congratulations.jpg',
          'category'					=> 'congratulations'
        ],
        [
          'theme'				=> url()->current().'/img/themes/HetWellSoon.jpg',
          'category'					=> 'getwell'
        ],
      ];
      foreach ($data as $key)
      {
        Theme::create([
          'theme'          => $key['theme'],
          'category'         => $key['category']
        ]);
      }
    }
}
