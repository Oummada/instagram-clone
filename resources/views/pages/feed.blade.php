@extends('layouts.app1')
@section('content')
    
<head><title>feed</title></head>

<main class="feed">
   @foreach ($posts as $post)
   <section class="photo">
    <header class="photo__header">
        <div class="photo__header-column">
            <img
                class="photo__avatar"
                src="images/avatar.jpg"
            />
        </div>
        <div class="photo__header-column">
            <span class="photo__username">{{$post->user->name}}</span>
            <span class="photo__location">European Art of Living Center - Bad Antogast</span>
        </div>
    </header>
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