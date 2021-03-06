<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // funzione che prende tutti i post dal database e crea l'api
    public function index(){
        // prendo dal model Post tutta la tabella 
        $posts = Post::all();

        // SCOPO: creeare un path assoluto di cover per facilitare il front-office
        foreach($posts as $post){
            // se esiste la chiave cover dentro $post
            if($post['cover']){
                //  allora crea il path assoluto
                $post->cover = url('storage/' . $post->cover);
            }
        }

        // la trasformo in un array di oggettti e lo mettiamo in un file json
        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }

    // funzione che prende solo i post che hanno lo stesso slug passato al'url
    public function show($slug){
        $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();

        // se esiste la chiave cover dentro $post
        if($post['cover']){
            //  allora crea il path assoluto
            $post->cover = url('storage/' . $post->cover);
        }        

        // creo l'api
        // solo se il post preso ha lo slag
        // altrimenti creo un api che ha success false e results è la chiave di un'array vuoto
        if($post){
            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        }else{
            return response()->json([
                'success' => false,
                'results' => []
            ]);
        };
    }
}
