<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        // prendo dal model Post tutta la tabella 
        $posts = Post::all();
        // la trasformo in un array di oggettti e lo mettiamo in un file json
        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }
}
