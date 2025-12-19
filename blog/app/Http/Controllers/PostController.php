<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
  $posts = Post::orderBy('titulo', 'asc')->paginate(5);
    return view('posts.index', compact('posts'));
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
  return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    $post = Post::findOrFail($id);

    return view('posts.show', compact('post'));
}

public function nuevoPrueba(){
    $post = new Post();
    $post->titulo= rand(100,999);
    $post->contenido=rand(100,999);
    $post->created_at= now();
    $post->updated_at= now();
    $post->save();
}

public function editarPrueba(string $id){
$posts = Post::findOrFail($id);
$posts->titulo="Otro título";
$posts->contenido= "Finalmente he editado el contenido";

 $posts->updated_at= now();
$posts->save();
  

}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
{
    Post::findOrFail($id)->delete();
    return redirect()->route('posts.index')
    ->with('success', 'Post eliminado correctamente');
}

}
