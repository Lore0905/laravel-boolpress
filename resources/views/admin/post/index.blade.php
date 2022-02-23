@extends('layouts.dashboard')

@section('content')
    @foreach ($posts as $post)

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted"><strong>slug:  </strong>{{$post->slug}}</h6>
            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('admin.post.edit', [$post->id])}}" class="card-link">Card link</a>
            <a href="post/{{$post->id}}" class="card-link">details</a>
            </div>
        </div>

    @endforeach
@endsection
