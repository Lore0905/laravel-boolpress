@extends('layouts.dashboard')


@section('content')
    <section class="container">

        <h2>Crea il tuo Post</h2>

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

        <form action="{{ route('admin.post.store') }}" method="post">
            @csrf
            @method('POST')
            
            {{-- categories --}}
            <div class="mb-2">categoria</div>
            <select class="form-select" id="category_id" name="category_id" >

                <option value="">Nessuna</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach

            </select>

            {{-- title --}}
            <div class="my-3">
                <label for="title" class="form-label" >Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>

            {{-- tag --}}
            <div class="mb-3">
                {{-- title section --}}
                <div>Tags</div>

                {{-- chekbox --}}
                @foreach ($tags as $tag)
                    
                    <div class="form-check">
                        {{--spiegazione funzionalità {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                        scopo: IN PRESENZA DI EROORE inserire il tag checked solo se la input era stata checkata precedentemente, altrimenti restituire una stringua vuota
                        come funziona: verifica se dentro l'arrey old(tags) sono presenti i relativi $tag-id di ogni input. Se è presente il $tag->id dentro l'arrey old(tags) restituisce 'checked', altrimenti ''. --}}
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{'tag-'.$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{'tag-'.$tag->id}}">
                        {{$tag->name}}
                        </label>
                    </div>

                @endforeach
                
            </div>

            {{-- content --}}
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10" >{{old('content')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </section>
@endsection
