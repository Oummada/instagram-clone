<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
public function feed()
{
    return view('pages/feed');
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
return back();
}

}
