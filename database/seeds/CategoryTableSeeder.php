<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
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
          'category'				          => 'Birthday'
        ],
        [
          'category'				          => 'Christmas'
        ],
        [
          'category'				          => 'Congratulations'
        ],
        [
          'category'				          => 'For Her'
        ],
        [
          'category'				          => 'For Him'
        ],
        [
          'category'				          => 'Love'
        ],
        [
          'category'				          => 'Get Well Soon'
        ],
      ];
      foreach ($data as $key)
      {
        Category::create([
          'category'                => $key['category']
        ]);
      }
    }
}
