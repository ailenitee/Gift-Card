<?php

use Illuminate\Database\Seeder;
use App\Denomination;
class DenominationTableSeeder extends Seeder
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
          'denomination'					=> '100'
        ],
        [
          'denomination'					=> '200'
        ],
        [
          'denomination'					=> '500'
        ],
        [
          'denomination'					=> '1000'
        ],
        [
          'denomination'					=> '2000'
        ]
      ];
      foreach ($data as $key)
      {
        Denomination::create([
          'denomination'         => $key['denomination']
        ]);
      }
    }
}
