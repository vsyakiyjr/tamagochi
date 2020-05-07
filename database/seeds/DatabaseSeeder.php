<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
		
    DB::table('users')->insert([
      'id' => 1,
      'name' => 'usertest',
      'email' => 'usertest@gmail.com',
      'password' => bcrypt('usertest'),
    ]);
	
    DB::table('tamagochi_types')->insert([
      'id' => 1,
      'name' => 'test1',
    ]);
	
    DB::table('tamagochi_types')->insert([
      'id' => 2,
      'name' => 'test2',
    ]);
	
    DB::table('tamagochi_types')->insert([
      'id' => 3,
      'name' => 'test3', 
    ]);
	
    }
}
