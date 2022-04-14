<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    // $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index() {
    if (Gate::allows('isAdmin')) {
      return redirect('admin/dashboard');
    } else {
      return view('home');
    }
  }

  public function dashboard() {
    return view('dashboard');
  }

  public function profile() {
    if (Gate::allows('isUser')) {
      $user = User::find(Auth::id());
      return view('profile', ["user"=>$user]);
    } else {
      return view('home');
    }
  }

  public function editProfile(Request $request)
  {
    $user = User::find(Auth::id());
    $user->update($request->all());
    return redirect('/profile');
  }
  
}
