@extends('layouts.main')

@section('content')
	<div class="callout primary"> 
    <article class="grid-container">
      <div class="">
         <a href=<?php echo url('/');?>/gallery/show/{{$photo->gallery_id}}> Back to Gallery</a> 
        <h1>{{$photo->title}}</h1>
        <p class="lead">{{$photo->description}}</p>
        <p class="lead">Location :{{$photo->location}}</p>
      </div>
    </article>
  </div>
		<article class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
       <img class="main-img" src=<?php echo url('/');?>/images/{{$photo->image}}>
     
    </div>

    <hr>
  </article>
@stop