<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $this->call(ThemesTableSeeder::class);
    $data = [
      [
        'name'				=> 'superadmin',
        'email'					=> 'superadmin@glyphgames.com',
        'password'				=> bcrypt('1q2w3e4R'),
        'username'				=> 'superadmin',
        'mobile'					=> '0000',
        'roles'						=> '0',
        'status'				=> '1'
      ],
      [
        'name'				=> 'admin',
        'email'					=> 'admin@glyphgames.com',
        'password'				=> bcrypt('admin'),
        'username'				=> 'administrator',
        'mobile'					=> '0000',
        'roles'						=> '1',
        'status'				=> '1'
      ]
    ];
    foreach ($data as $key)
    {
      User::create([
        'name'          => $key['name'],
        'email'         => $key['email'],
        'password'      => $key['password'],
        'username'	    => $key['username'],
        'mobile'		    => $key['mobile'],
        'roles'			    => $key['roles'],
        'status'			  => $key['status'],
      ]);
    }
  }
}
