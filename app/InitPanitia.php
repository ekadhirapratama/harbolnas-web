<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitPanitia extends Model
{
    public function showData()
    {
      $panitia = [
        0 => [
          'logo' => '/images/assets/Panitia/elevenia.co.id/logo-PNG-new.png',
          'url' => 'http://elv11.co/whb',
          'alt' => ''
        ],
        1 => [
          'logo' => '/images/assets/Panitia/LUXATME/logo_fint_icon_samping_dasar_hitam_(2).png',
          'url' => 'https://luxatme.com/?utm_source=harbolnas-2018&utm_medium=logo&utm_campaign=website-harbolnas&utm_term=home-banner',
          'alt' => ''
        ],
        2 => [
          'logo' => '/images/assets/Panitia/VIP PLAZA/logo-vipplaza-new.png',
          'url' => 'http://www.vipplaza.co.id',
          'alt' => ''
        ],
        3 => [
          'logo' => '/images/assets/Panitia/ShopBack/sblogo_red_2017.png',
          'url' => 'https://www.shopback.co.id/harbolnas',
          'alt' => 'harbolnas 2018 di shopback'
        ],
        4 => [
          'logo' => '/images/assets/Panitia/BERRYBENKA/logo-berrybenka-new.png',
          'url' => 'Https://berrybenka.com?utm_source=harbolnasweb&utm_medium=website&utm_campaign=harbolnas2018&utm_content=harbolnas2018',
          'alt' => ''
        ],
        5 => [
          'logo' => '/images/assets/Panitia/Shopee/SHOPEE_logo-horizontal-2.png',
          'url' => 'http://shopee.co.id',
          'alt' => ''
        ],
        6 => [
          'logo' => '/images/assets/Panitia/Blibli.com/logo_blibli.png',
          'url' => 'https://www.blibli.com/',
          'alt' => ''
        ],
        7 => [
          'logo' => '/images/assets/Panitia/Cermati.com/Cermati_Master_Logo-Type_Place_2_(1).png',
          'url' => 'http://bit.ly/cermati-12122018',
          'alt' => ''
        ],
        8 => [
          'logo' => '/images/assets/Panitia/Ayopop/Ayopop-HiResLogo.png',
          'url' => 'https://apps.ayopop.id/cNVY2Q0ZSR',
          'alt' => ''
        ],
        9 => [
          'logo' => '/images/assets/Panitia/Zalora/ZALORA_logo-new.png',
          'url' => 'https://www.zalora.co.id/',
          'alt' => ''
        ],
        10 => [
          'logo' => '/images/assets/Panitia/lazada/lazada.png', //lazada
          'url' => 'https://www.lazada.co.id/#',
          'alt' => ''
        ],
        11 => [
          'logo' => '/images/assets/Panitia/Telunjuk.com/Telunjuk_Logo.png',
          'url' => 'https://www.telunjuk.com/',
          'alt' => ''
        ],
        12 => [
          'logo' => '/images/assets/Panitia/Ruparupa.com/Ruparupa.png',
          'url' => 'https://www.ruparupa.com/',
          'alt' => ''
        ],
        13 => [
          'logo' => '/images/assets/Panitia/Prelovedbydela.com/PrelovedByDela_Logo_dark-new.png',
          'url' => 'http://Prelovedbydela.com',
          'alt' => ''
        ],
        14 => [
          'logo' => '/images/assets/Panitia/accesstrade/ATLOGO_PNG.png',
          'url' => 'https://accesstrade.co.id',
          'alt' => ''
        ],
        15 => [
          'logo' => '/images/assets/Panitia/Semua_Sale/SS_logo_New.png',
          'url' => 'https://semua.sale',
          'alt' => ''
        ],
        16 => [
          'logo' => '/images/assets/Panitia/ICDX(gofx)/ICDX.png',
          'url' => 'http://www.icdx.co.id/',
          'alt' => ''
        ],
      ];

      return $panitia;
    }
}
