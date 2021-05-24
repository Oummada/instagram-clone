<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

class ProfileController extends Controller
{
   public function profile()
   {
      $posts=Post::where('user_id',Auth::user()->id)->get();
     
      return view('pages/profile', ['posts'=>$posts]);
   }

   public function editprofile($id)
   {
      $profile=Profile::find($id);

      return view('pages/edit_profile' , ['profile'=>$profile]);
   }



   public function updateProfile(Request $req,$id)
   {
    $profile=Profile::find($id);
    $profile->name=$req->name;
    $profile->username=$req->username;
    $profile->bio=$req->bio;
    $profile->email=$req->email;
    $profile->website=$req->website;
    $profile->gender=$req->gender;
    $profile->user_id=Auth::user()->id;
    $profile->save();
    return back();

   }
}
