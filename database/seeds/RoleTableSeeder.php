<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
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
          'role'				=> 'admin',
        ],
        [
          'role'				=> 'member',
        ]
      ];
      foreach ($data as $key)
      {
        Role::create([
          'role'          => $key['role']
        ]);
      }
    }
}
