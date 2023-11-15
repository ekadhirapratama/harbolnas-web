<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
          'name' => 'Superuser',
        ],
        [
          'name' => 'Admin',
        ],
        [
          'name' => 'User',
        ]
      ];

      DB::table('init_role')->insert($data);
    }
}
