<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function profile()
   {
      $posts=Post::where('user_id',Auth::user()->id)->get();
      return view('pages/profile', ['posts'=>$posts]);
   }
   public function editprofile()
   {
      return view('pages/edit_profile');
   }
}
