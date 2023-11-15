<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Marketplace',
            'url_cover' => '/images/categories/MArketplace.jpg',
          ],
          [
            'name' => 'Elektronic',
            'url_cover' => '/images/categories/Elektronik.jpg',
          ],
          [
            'name' => 'Fashion Beauty',
            'url_cover' => '/images/categories/Fashion_Beauuty.jpg',
          ],
          [
            'name' => 'Food Beverages',
            'url_cover' => '/images/categories/Food_Beverages.jpg',
          ],
          [
            'name' => 'Groceries',
            'url_cover' => '/images/categories/Groceries.jpg',
          ],
          [
            'name' => 'Travel / OTA',
            'url_cover' => '/images/categories/Travel_OTA.jpg',
          ],
          [
            'name' => 'Perabot Rumah Tangga',
            'url_cover' => '/images/categories/Perabot_Rumah_Tangga.jpg',
          ],
          [
            'name' => 'Jasa',
            'url_cover' => '/images/categories/Jasa.jpg',
          ],
          [
            'name' => 'Automotive',
            'url_cover' => '/images/categories/Automotive.jpg',
          ],
          [
            'name' => 'Mom Baby',
            'url_cover' => '/images/categories/Mom_Baby.png',
          ],
        ];

        DB::table('init_categories')->insert($data);
    }
}
