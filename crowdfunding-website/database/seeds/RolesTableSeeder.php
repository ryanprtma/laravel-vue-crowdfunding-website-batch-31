<?php

use Illuminate\Database\Seeder;
use App\roles;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        roles::create([
            'name' => 'admin',
        ]);

        roles::create([
            'name'=> 'user',
        ]);
    }
}
