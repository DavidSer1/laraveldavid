<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
public function index()
{
    $posts = Post::with('usuario')
        ->orderBy('titulo', 'asc')
        ->paginate(5);

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
public function store(PostRequest $request)
{
    Post::create([
        'titulo' => $request->titulo,
        'contenido' => $request->contenido,
        'usuario_id' => auth()->id(), 
    ]);

    return redirect()->route('posts.index')
        ->with('success', 'Post creado correctamente');
}



    /**
     * Display the specified resource.
     */
public function show(string $id) {
    $post = Post::findOrFail($id);
    return view('posts.show', compact('post'));
}

public function nuevoPrueba() {
    $post = new Post();
    $post->titulo = rand(100,999);
    $post->contenido = rand(100,999);
    $post->usuario_id = 1;
    $post->created_at = now();
    $post->updated_at = now();
    $post->save();

    return redirect('/posts')
        ->with('success', 'El post se ha creado correctamente');
}


public function destroy(string $id)
{
    $post = Post::findOrFail($id);
    $user = Auth::user();

    if ($user->rol !== 'admin' && $post->usuario_id !== $user->id) {
        return redirect()->route('posts.index');
    }

    $post->delete();

    return redirect()->route('posts.index')
        ->with('success', 'Post eliminado correctamente');
}


public function editarPrueba(string $id){
    $posts = Post::findOrFail($id);
    $posts->titulo="Este es un titulo actualizado";
    $posts->contenido= "Este contenido contiene imformacion actualizada del post.";
    $posts->updated_at= now();
    $posts->save();
    return redirect('/posts')->with('success', 'El post se ha editado correctamente');
}
  
    /**
     * Show the form for editing the specified resource.
     */
 public function edit(string $id)
{
    $post = Post::findOrFail($id);
    $user = Auth::user();

    if ($user->rol !== 'admin' && $post->usuario_id !== $user->id) {
        return redirect()->route('posts.index');
    }

    return view('posts.edit', compact('post'));
}


    /**
     * Update the specified resource in storage.
     */
public function update(PostRequest $request, string $id)
{
    $post = Post::findOrFail($id);
    $user = Auth::user();

    if ($user->rol !== 'admin' && $post->usuario_id !== $user->id) {
        return redirect()->route('posts.index');
    }

    $post->update($request->validated());

    return redirect()
        ->route('posts.index')
        ->with('success', 'El post se ha actualizado correctamente');
}


    /**
     * Remove the specified resource from storage.
     */


}
