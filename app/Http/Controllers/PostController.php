<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
public function feed()
{
    $posts=Post::all();
    $users=ModelsUser::all();
    return view('pages/feed',['posts'=>$posts] ,['users'=>$users]);
}


public function postPage()
{
    return view('pages/newPost');
}

public function store(Request $req)
{
    $post=new Post();
    $post->title=$req->caption;

if ($req->hasFile('image')) {
    $path=$req->image->store('photos');
}
$post->photo=$path;
$post->user_id=Auth::user()->id;
$post->save();
return redirect('profile');

}

public function deleted($id)
{
   $post=Post::find($id);
   $post->delete();
   return back();
}
}
