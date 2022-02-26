<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;

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
        // prendo tutte le categorie dal model Category
        $categories = Category::all();

        // prendo tutti i tag
        $tags = Tag::all();

        $data = [
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.post.create', $data);
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
        // salvo i dati nel database
        $new_post->save();
        // utilizzo la funzione tags() creata nel Model Post
        $new_post->tags()->sync($new_post_data['tags']);

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

        $tag = $post->tags;

        $data = [
            'post' => $post,
            'tag' => $tag
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
        // prendo tutte le categorie dal model Category
        $categories = Category::all();

        $data = [
            'post' => $edit_post,
            'categories' => $categories
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
        $post_data = $request->all();
        $request->validate($this->validation());

        $post = Post::findOrFail($id);

        // devo aggiornare lo slug solamente se il cliente cambia il titolo altrimenti, non avrebbe senso
        if($post->title != $post_data['title']){

            $post_data['slug'] = $this->getSlug($post_data['title']);

        };

        $post->update($post_data);

        return redirect()->route('admin.post.show', [$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.index');
    }
    protected function validation() {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
            'category_id' => 'exists:categories,id|nullable'
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
