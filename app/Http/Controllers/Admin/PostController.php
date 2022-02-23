<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_post_data = $request->all();

        $request->validate($this->validation());

        $new_post = new Post();
        $new_post->fill($new_post_data);
        $new_post->slug = $this->getSlug($new_post_data['title']);

        $new_post->save();

        return redirect()->route('admin.post.show', [$new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post' => $post
        ];

        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_post = Post::findOrFail($id);

        $data = [
            'post' => $edit_post
        ];

        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function validation() {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000'
        ];
    }
    protected function getSlug($title){
        // creo lo slug
        $slug = Str::slug($title);
        $slug_base = $slug;

        // cerco nel database se è presente uno slug uguale
        $slug_find = Post::where('slug', '=', $slug)->first();

        // se è presente incremento lo slug di 1
        $counter = 1;

        while($slug_find){

            $slug = $slug_base . '-' . $counter;

            $slug_find = Post::where('slug', '=', $slug)->first();

            ++$counter;
        }
        return $slug;
    }
}