<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $user = User::where('email',$request->loginemail)->first();
      if (!$user) {
        return redirect()->back()->withErrors(['loginerror'=>'Maaf akun tidak terdaftar.'])->withInput();
      }
      elseif (!Hash::check($request->loginpassword,$user->password)) {
        return redirect()->back()->withErrors(['loginerror'=>'Maaf kombinasi email dan password anda salah.'])->withInput();
      }
      elseif ($user->status < 0) {
        return redirect()->back()->withErrors(['loginerror'=>'Maaf akun anda telah suspend, silahkan hubungi Customer Servis kami.'])->withInput();
      }
      else {
        Auth::login($user);
        return redirect('/dashboard');
      }
    }

    public function logout(){
      Auth::guard('web')->logout();
      // return redirect('/forum');
      return redirect('/');
    }
}
