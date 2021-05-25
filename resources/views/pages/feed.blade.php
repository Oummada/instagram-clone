@extends('layouts.app1')
@section('content')
    
<head><title>feed</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<main class="feed">
   @foreach ($posts as $post)
   <section class="photo">
    <header class="photo__header">
        <div class="photo__header-column">
            @foreach ($users as $user)
                @if ($user->id == $post->user_id)                 
                <img
                    class="photo__avatar"
                    src="{{asset('storage/'.$user->profile->image)}}"
                />
                @endif
            @endforeach
        </div>
        <div class="photo__header-column">
            <span class="photo__username">{{$post->user->name}}</span>
            <span class="photo__location">European Art of Living Center - Bad Antogast</span>
        </div>
    </header>
    @if ($post->user_id== Auth::user()->id)
    <form action="{{route('deletePost',['id'=>$post->id])}}" method="post">
@method('DELETE')
@csrf
        <button class="btn btn-sm btn-secondary">delete</button>
    </form>
        
    @endif
    <div class="photo__file-container">
        <img
            class="photo__file"
            src="{{asset('storage/'.$post->photo)}}"
        />
    </div>
    <div class="photo__info">
        <div class="photo__icons">
            <span class="photo__icon">
                <i class="fa fa-heart-o heart fa-lg"></i>
            </span>
            <span class="photo__icon">
                <i class="fa fa-comment-o fa-lg"></i>
            </span>
        </div>
        <span class="photo__likes">35 likes</span>
        <ul class="photo__comments">
            <li class="photo__comment">
                <span class="photo__comment-author">serranoarevalo</span>wow this is great!
            </li>
            <li class="photo__comment">
                <span class="photo__comment-author">lynn</span>no is not!
            </li>
        </ul>
        <span class="photo__time-ago">11 hours ago</span>
        <div class="photo__add-comment-container">
            <textarea placeholder="Add a comment..." class="photo__add-comment"></textarea>
            <i class="fa fa-ellipsis-h"></i>
        </div>
    </div>
</section>
   @endforeach
  
</main>


@endsection