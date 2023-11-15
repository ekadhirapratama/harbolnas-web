<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Superuser',
            'email' => 'superuser@harbolnas.com',
            'password' => bcrypt('inipromo#@!'),
            'role' => 1,
        ]);
    }
}
