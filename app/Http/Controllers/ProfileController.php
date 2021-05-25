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
      $profile=Profile::where('user_id',Auth::user()->id)->first();
      return view('pages.profile', ['posts'=>$posts], ['profile'=>$profile]);
   }

   public function editprofile($id)
   {
      $profile=Profile::where('user_id',$id)->first();

      return view('pages.edit_profile' , ['profile'=>$profile]);
   }



   public function updateProfile(Request $req)
   {
    $profile=Profile::where('user_id',Auth::user()->id)->first();
    $profile->username=$req->username;
    $profile->bio=$req->bio;
    $profile->website=$req->website;
    $profile->gender=$req->gender;
    $profile->phone=$req->phone;
if ( $req->hasFile('image')) {
   $path=$req->image->store('profilePhotos');
}
$profile->image=isset($req->image) ? $path : $profile->image ;
    $profile->user_id=Auth::user()->id;
    $profile->save();
    return redirect('profile');
   }
}
