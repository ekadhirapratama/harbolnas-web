<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InitCategory;
use App\InitAsset;
use App\InitPanitia;
use App\Promo;

class PagesController extends Controller
{
    public function viewLanding()
    {
      $init_assets = new InitAsset();
      $assets = $init_assets->showData();

      $init_panitia = new InitPanitia();
      $panitia = $init_panitia->showData();

      // $categories = InitCategory::all();

      return view('pages.landing',compact('assets','panitia'));
    }

    public function viewAbout()
    {
      return view('pages.about');
    }

    public function viewParticipant()
    {
      $categories = InitCategory::all();

      return view('pages.participant',compact('categories'));
    }

    public function viewDetailParticipant(Request $request)
    {
      $categories = InitCategory::all();
      $init_assets = new InitAsset();
      $assets = $init_assets->showData();

      if ($request->kategori == $categories[$request->id]['name']) {
        $selected_category = $categories[$request->id];

        $url_banner = $assets['category'][$selected_category->id-1];
        $page = 0;
        if ($request->has('page')) {
          $page = $request->page;
        }
        $type_id = 2;
        $category = $selected_category->id;
        $limit = 12;
        $array = $this->getPromo($type_id,$category,$page,$limit);

        $promos = $array['promos'];
        $last_page = $array['last_page'];

        return view('pages.participant_detail', compact('selected_category','categories','promos','last_page','page','url_banner','type_id','category','limit'));
      }

      return redirect('/peserta-harbolnas');
    }

    public function viewPromoPartner()
    {
      $init_assets = new InitAsset();
      $assets = $init_assets->showData();

      return view('pages.promo-partner', compact('assets'));
    }

    public function viewDetailPromoPartner(Request $request)
    {
      $explode = explode('/',$request->url());
      $promo_name = $explode[count($explode)-1];

      $init_assets = new InitAsset();
      $assets = $init_assets->showData();

      $type_id = 0;
      $main_banner = '';
      $url_banner = '';

      if ($promo_name == 'mandiri') {
        $type_id = 3;
        $main_banner = $assets['promo-partner'][2];
        $url_banner = $assets['promo-partner'][2];
      }
      elseif ($promo_name == 'Cimb-niaga') {
        $type_id = 4;
        $main_banner = $assets['promo-partner'][3];
        $url_banner = $assets['promo-partner'][3];
      }
      else {
        return redirect()->back();
      }

      $page = 0;
      if ($request->has('page')) {
        $page = $request->page;
      }
      $category = 0;
      $limit = 12;
      $array = $this->getPromo($type_id,$category,$page,$limit);
      $promos = $array['promos'];
      $last_page = $array['last_page'];

      return view('pages.promo-partner_detail', compact('assets', 'promos','last_page','page','url_banner','main_banner','type_id','category','limit'));
    }

    public function viewExperienceCenter()
    {
      return view('pages.experience-center');
    }

    public function viewProductLocal(Request $request)
    {
      $init_panitia = new InitPanitia();
      $panitia = $init_panitia->showData();

      $init_assets = new InitAsset();
      $assets = $init_assets->showData();

      $page = 0;
      if ($request->has('page')) {
        $page = $request->page;
      }
      $type_id = 1;
      $category = 0;
      $limit = 12;
      $array = $this->getPromo($type_id,$category,$page,$limit);
      $promos = $array['promos'];
      $last_page = $array['last_page'];
      $spesial_promos = $assets['promo-spesial'];

      return view('pages.product-local', compact('panitia','promos','spesial_promos','last_page','page','type_id','category','limit'));
    }

    public function viewRegister()
    {
      return view('pages.register');
    }

    public function getPromo($type_id,$category,$page,$limit)
    {
      $promo = Promo::where('type_id',$type_id)
      ->where('status',1)->orderBy('created_at', 'asc');

      if ($type_id == 2) {
        $promo = $promo->where('category_id',$category);
      }

      if ($page > 0) {
        $page = $page;
      }

      $last_page = ceil($promo->count()/$limit);
      $promos = $promo->skip($page*$limit)->limit($limit)->get();

      if (count($promos)==0) {
        $is_last = true;
      } else {
        $is_last = false;
      }

      return [
        'promos'=>$promos,
        'data'=>view('partials.promo', compact('promos','page','type_id','category','limit'))->render(),
        'last_page'=>$last_page,
        'is_last'=>$is_last
      ];
    }
}
