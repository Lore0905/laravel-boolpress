@extends('layouts.dashboard')
@section('content')
<div class="card">

    <div class="card-header">
      <h6><strong>slug: </strong>{{$post->slug}}</h6>
      <h6><strong>Category: </strong>{{$post->category ? $post->category->name : 'nessuna categoria'}}</h6>

      <h6><strong>Tag:</strong>
      
      @forelse ($tag as $single_tag)
        <span>
          {{$single_tag->name}}{{!$loop->last ? ',' : ''}}
        </span>
      @empty
        <span>nessun tag</span>
      @endforelse
      </h6>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->content}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@endsection