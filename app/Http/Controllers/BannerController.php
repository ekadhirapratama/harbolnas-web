<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use App\InitType;
use Validator;
use Auth;

class BannerController extends Controller
{
    public function create(Request $request)
    {
      $user = Auth::user();

      $validator = Validator::make($request->input(), [
          'type_id' => 'required',
          'category_id' => 'required',
          'url' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect('/dashboard')
            ->withErrors($validator)
            ->withInput();
      }

      if (!$request->hasFile('url_banner')) {
        return redirect('dashboard')->with(['errors' => 'Banner is required']);
      }

      $photo = fopen($request->url_banner,"r");
      $extension = $request->url_banner->extension();
      $photopath = '';

      if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
        $type = InitType::find($request->type_id);
        $promo_name = strtolower(explode(" ", $type->name)[1]);
        $photoname = $promo_name.'-'.$user->id.$user->promo->count().'.png';
        $folder = '/images/uploads/';
        $photopath = $folder.$photoname;

        $request->url_banner->move(public_path($folder),$photoname);

        $url = $request->url;
        if (substr($url,0,4) != 'http') {
          $url = 'http://'.$url;
        }

        $promo = Promo::create([
          'type_id' => $request->type_id,
          'category_id' => $request->category_id,
          'user_id' => $user->id,
          'url' => $url,
          'url_banner' => $photopath,
        ]);
      }

      return redirect('/dashboard');
    }

    public function getPromo($id)
    {
      $id = explode("-",$id);
      $disabled = true;

      $promo = Promo::find($id[1]);
      if ($promo->user_id == Auth::user()->id) {
        $disabled = false;
      }

      $data = [
        'id' => $id[1],
        'type' => [
          'id' => $promo->type_id,
          'name' => $promo->type['name']
        ],
        'category' => [
          'id' => $promo->category_id,
          'name' => $promo->category['name']
        ],
        'url' => $promo->url,
        'url_banner' => $promo->url_banner,
        'created_at' => $promo->created_at,
        'status' => $promo->status,
        'disabled' => $disabled
      ];

      return $data;
    }

    public function edit(Request $request)
    {
      $promo = Promo::find($request->id);
      $change = 0;

      if ($request->has('type_id') && $promo->type_id != $request->type_id) {
        $promo->type_id = $request->type_id;
        $change = 1;
      }

      if ($request->has('category_id') && $promo->category_id != $request->category_id) {
        $promo->category_id = $request->category_id;
        $change = 1;
      }

      if ($request->has('url') && $promo->url != $request->url) {
        $promo->url = $request->url;
        $change = 1;
      }

      if ($request->has('promo_action') && $promo->status != $request->promo_action) {
        $promo->status = $request->promo_action;
        $change = 1;
      }

      if ($request->hasFile('url_banner')) {
        $photo = fopen($request->url_banner,"r");
        $extension = $request->url_banner->extension();
        $photopath = '';

        if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
          $type = $promo->type['name'];
          $promo_name = strtolower(explode(" ", $type)[1]);
          $photoname = $promo_name.'-'.Auth::user()->id.Auth::user()->promo->count().'.png';
          $folder = '/images/uploads/';
          $photopath = $folder.$photoname;

          if(\File::exists($photopath)) {
            \File::delete($photopath);
          }

          if ($promo->url_banner != $photopath) {
            $promo->url_banner = $photopath;
          }

          $request->url_banner->move(public_path($folder),$photoname);
        }
        $change = 1;
      }

      if ($change == 1) {
        if (Auth::user()->role == 3 && $promo->status == -1) {
          $promo->status = 0;
        }
        $promo->save();
      }
      return redirect('/dashboard');
    }

    public function delete(Request $request)
    {
      $promo = Promo::find($request->id);
      $promo->status = -2;
      $promo->save();

      return redirect('/dashboard');
    }
}
