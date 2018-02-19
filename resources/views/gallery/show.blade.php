@extends('layouts.main')

@section('content')
 <div class="callout primary">
    <article class="grid-container">
      <div class="">
      	<a href=<?php echo url('/');?>>Back to Galleries</a>
        <h1>{{$gallery->name}}</h1>
        <p class="lead">{{$gallery->description}}</p>
        <?php if(Auth::check()) : ?>
        <a  class="button" href=<?php echo url('/');?>/photo/create/{{$gallery->id}}>Upload Photo</a>
        <?php endif ?> 
      </div>
    </article>
  </div>
		<article class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
      <?php foreach ($photos as $photo) : ?>
      <div class="cell">
         <a href=<?php echo url('/');?>/photo/details/{{$photo->id}}> 
          <img class="thumbnail" src=<?php echo url('/');?>/images/{{ $photo->image }}>
        </a>
        <h5>{{$photo->title}}</h5>
        <p>{{$photo->description}}</p>
      </div>
      <?php endforeach; ?>
      
    </div>

    <hr>
  </article>
@stop