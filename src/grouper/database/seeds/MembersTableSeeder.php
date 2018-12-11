<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Member::class, 1)->create([
            'first_name' => 'Tom',
            'last_name' => 'Soisoonthorn',
            'email' => 'tom.soisoonthorn@gmail.com',
            'company' => 'RLJ Entertainment',
        ]);
        factory(\App\Member::class, 47)->create();
    }
}
