@extends('layouts.dashboard')

@section('content')
<div class="card">

    <div class="card-header">
      <h6><strong>slug: </strong>{{$post->slug}}</h6>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->content}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@endsection