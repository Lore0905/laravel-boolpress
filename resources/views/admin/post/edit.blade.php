@extends('layouts.dashboard')

@section('content')

    {{-- title --}}
    <h2>Modifica il tuo Post</h2>

    {{-- ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.post.update', [$post->id])}}" method="post">

        @csrf
        @method('PUT')

        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label" >Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $post->title}}">
        </div>

        {{-- content --}}
        <div class="mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10" >{{old('content') ? old('content') : $post->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
