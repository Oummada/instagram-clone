@extends('layouts.app1')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>new post | Instaclone</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
    
<div class="col-md-3">
<form class="form-group" method="POST" action="{{ route('store') }}" class="login__form" enctype="multipart/form-data">
    @csrf
    <div class="login__input-container">
        <input 
       
        type="file" 
        name="image" 
        value="{{ old('image') }}" 
        required 
      
        placeholder="image" 
        autofocus 
        class="login__input" />
    </div>
   
    <div class="login__input-container">
        <input  id="" 
        type="text" 
         name="caption" 
         placeholder="caption"
         required 
         autocomplete="current-password" 
         class="login__input" 
        />
   
    <div class="login__input-container">
        <input
            type="submit"
            value="Post"
            class="login__input login__input--btn"
        />
    </div>
</form>
</div>
@endsection