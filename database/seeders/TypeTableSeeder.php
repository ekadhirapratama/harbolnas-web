<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
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
            'name' => 'Promo Khusus Produk Lokal 11 Desember (bagi yang berpartisipasi)',
          ],
          [
            'name' => 'Promo General 12 Desember',
          ],
          [
            'name' => 'Promo Mandiri',
          ],
          [
            'name' => 'Promo CIMB Niaga',
          ]
        ];
        
        DB::table('init_types')->insert($data);
    }
}
