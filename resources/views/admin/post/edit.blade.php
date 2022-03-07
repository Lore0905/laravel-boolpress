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

    <form action="{{route('admin.post.update', [$post->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- categories --}}

        <span>Category:  </span>

        <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">

            <option value="">Nessuna</option>

            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach

        </select>

        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label" >Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $post->title}}">
        </div>

        {{-- tag --}}
        <div class="mb-3">
            {{-- title section --}}
            <div>Tags</div>

            {{-- chekbox --}}
            @foreach ($tags as $tag)
                
                <div class="form-check">

                    @if ($errors->any())
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{'tag-'.$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        
                    @else
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{'tag-'.$tag->id}}" name="tags[]" >
                    @endif

                    <label class="form-check-label" for="{{'tag-'.$tag->id}}">
                    {{$tag->name}}
                    </label>

                </div>

            @endforeach
            
        </div>

        {{-- content --}}
        <div class="mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10" >{{old('content') ? old('content') : $post->content}}</textarea>
        </div>

        {{-- immagine attuale --}}
        @if ($post->cover)
            <div class="mb-3">
                <img src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
            </div>
        @endif

        {{-- upload img --}}
        <div class="mb-3">
            <label for="img_path">Content</label>
            <input type="file" id="img_path" name="img_path">
        </div>

        {{-- button destry --}}
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>

    <div class="mt-2">
        <form action="{{ route('admin.post.destroy', [$post->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger">Delete</button>
            
        </form>
    </div>

@endsection
