<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\InitCategory;
use App\InitType;
use App\InitRole;
use App\Promo;
use App\User;
use Auth;
use Validator;

class UserController extends Controller
{
    public function viewDashboard()
    {
      $user = Auth::user();
      $categories = InitCategory::all();
      $types = InitType::all();
      $promos = Promo::orderBy('created_at', 'desc');

      if ($user->role == 3) {
        $promos = $promos->where('user_id', $user->id)->get();
      }
      else {
        $promos = $promos->get();
      }
      return view('user.dashboard',compact('promos','categories','types'));
    }

    public function viewAccount()
    {
      return view('user.account');
    }

    public function viewUser()
    {
      $user_lists = User::where('id','!=',Auth::user()->id);
      $user_lists = $user_lists->get();
      $roles = InitRole::all();

      return view('user.user-management',compact('user_lists','roles'));
    }

    public function create(Request $request)
    {
      $validator = Validator::make($request->input(), [
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required',
          'role' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect('/user-management')
            ->withErrors($validator)
            ->withInput();
      }

      $user = User::create([
        'name' => ucwords($request->name),
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role
      ]);

      return redirect('/user-management');
    }

    public function editprofile(Request $request)
    {
      $user = Auth::user();
      $change = 0;

      $validator = Validator::make($request->input(), [
          'name' => 'required',
          'email' => 'required|email|unique:users',
      ]);

      if ($validator->fails()) {
        return redirect('/account-setting')
            ->withErrors($validator)
            ->withInput();
      }

      if ($user->name != $request->name) {
        $user->name = ucwords($request->name);
        $change = 1;
      }

      if ($user->email != $request->email) {
        $user->email = $request->email;
        $change = 1;
      }

      if ($change == 1) {
        $user->save();
      }
      return redirect('/account-setting');
    }

    public function changePass(Request $request)
    {
      $user = Auth::user();

      if (Hash::check($request->password_old,$user->password) && $request->password_new == $request->password_confirm && $request->password_new != $request->password_old) {
        $user->password = bcrypt($request->password_new);
        $user->save();
      }
      return redirect('/account-setting');
    }

    public function getUser($id)
    {
      $id = explode("-",$id);
      $user = User::find($id[1]);

      $data = [
        'id' => $id[1],
        'name' => $user->name,
        'email' => $user->email,
        'role' => $user->role,
        'status' => $user->status,
      ];

      return $data;
    }

    public function edit(Request $request)
    {
      $user = User::find($request->id);
      $change = 0;

      if ($user->name != $request->name) {
        $user->name = $request->name;
        $change = 1;
      }

      if ($user->email != $request->email) {
        $user->email = $request->email;
        $change = 1;
      }

      if ($user->role != $request->role) {
        $user->role = $request->role;
        $change = 1;
      }

      if ($request->has('password')) {
        $user->password = bcrypt($request->password);
        $change = 1;
      }

      if ($user->status != $request->user_action) {
        $user->status = $request->user_action;
        $change = 1;
      }

      if ($change == 1) {
        $user->save();
      }

      return redirect('/user-management');
    }

    public function destroy(Request $request)
    {
      $user = User::find($request->id);
      $user->status = -2;
      $user->save();

      return redirect('/user-management');
    }
}
