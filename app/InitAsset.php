<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitAsset extends Model
{
    public function showData()
    {
      $assets = [
        'category' => [
          0 => '/images/categories/banner/Marketplace.png',
          1 => '/images/categories/banner/Elektronik.png',
          2 => '/images/categories/banner/Fashion.png',
          3 => '/images/categories/banner/Food_Beverages.png',
          4 => '/images/categories/banner/Groceries.png',
          5 => '/images/categories/banner/Travel.png',
          6 => '/images/categories/banner/Perabot.png',
          7 => '/images/categories/banner/Jasa.png',
          8 => '/images/categories/banner/Automotive.png',
          9 => '/images/categories/banner/Mom_Baby.png',
        ],

        'partner' => [
          0 => '/images/assets/Partner/Soekarno/Mandiri/Logo_Mandiri_tanpa_tagline.png',
          1 => '/images/assets/Partner/Soekarno/Midtrans/midtrans–Logo.png',
          2 => '/images/assets/Partner/Bung_Hatta/Logo_CIMB_Niaga.jpeg',
          3 => '/images/assets/Partner/Bung_Hatta/FBWordmark-RGB-1024.png',
          4 => '/images/assets/Panitia/ShopBack/sblogo_red_2017.png',
          5 => '/images/assets/Partner/Sudirman/logo_imx-sm.png',
          6 => '/images/assets/Partner/Sudirman/Popbox_Pop_Express/PopBox/PopBox_Logo-01.png',
          7 => '/images/assets/Partner/Sudirman/Popbox_Pop_Express/PopExpress/Logo_PopExpress-01.png',
          8 => '/images/assets/Partner/Sudirman/JET_Express/logo_FA_jet2_crop.jpg',
          9 => '/images/assets/Partner/Sudirman/ATM_prima.png',
        ],

        'kementrian' => [
          0 => '/images/assets/kementrian/image1.png',
          1 => '/images/assets/kementrian/image2.png',
          2 => '/images/assets/kementrian/image3.png',
          3 => '/images/assets/kementrian/image4.png',
        ],

        'promo-partner' => [
          0 => '/images/assets/Banner_Mandiri_terbaru_93_.png',
          1 => '/images/assets/Banner_cimb_terbaru_90_.png',
          2 => '/images/assets/Mandiri_Banner_big.png',
          3 => '/images/assets/CIMB_Banner_big.png',
        ],

        'promo-spesial' => [
          0 => [
            'url' => 'https://www.shopback.co.id/ukm-market',
            'url_banner' => '/images/spesial/UKM_market_shopback.jpg'
          ],
          1 => [
            'url' => 'https://lunahabit.com/collections/special-offers',
            'url_banner' => '/images/spesial/luna_habit.jpg'
          ],
          2 => [
            'url' => 'https://popitsnack.com/en/',
            'url_banner' => '/images/spesial/popit_snack_v2.jpg'
          ],
          3 => [
            'url' => 'http://www.rollover-reaction.com/',
            'url_banner' => '/images/spesial/rollover_reaction.jpg'
          ],
          4 => [
            'url' => 'https://www.yojo.coffee/shop',
            'url_banner' => '/images/spesial/yojo_coffee.PNG'
          ],
          5 => [
            'url' => 'https://sipetek.id/harbolnas',
            'url_banner' => '/images/spesial/sipetek_v2.jpg'
          ],
          6 => [
            'url' => 'https://www.blibli.com/promosi/gin-histeria-1212-apps',
            'url_banner' => '/images/spesial/blibli.jpg'
          ],
        ],
      ];

      return $assets;
    }
}
