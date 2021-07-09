<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view("admin.posts.index" , [
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view("admin.posts.create" , ["categories" => $categories,
                                            "tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Auth $authUser)
    {
        // Valida i dati in ingresso dal Form in "create"
        $request->validate([
            "title" => "required|max:255",
            "content" => "required",
            "slug" => "required",
            //"tags" => "exists:tags,id"
        ]);

        // Recupera tutti i dati che ha inserito l'utente dal "request"
        $newPostsData = $request->all();


        // Crea istanza del Model Post
        $newPost = new Post();
        // Riempie i dati del Model Post
        $newPost->fill($newPostsData);
        // Salva i dati nel database

        $newPost->user_id= $request->user()->id;

        
        
        $newPost->save();
        
        $newPost->tags()->detach();
        $newPost->tags()->attach($newPostsData["tags"]);

        return redirect()->route("admin.posts.index"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        // $tags = Tag::all();

        return view("admin.posts.show" , [
            "post" => $post,
            // "tags" => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view("admin.posts.edit" , [
            "post" => $post , "categories" => $categories , "tags" => $tags
        ]);
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
        // Valida i dati in ingresso dal Form in "create"
        $request->validate([
            "title" => "required|max:255",
            "content" => "required",
            "slug" => "required",
            "tags" => "exists:tags,id"
        ]);

        // Recupera tutti i dati che ha inserito l'utente dal "request"
        $newPostData = $request->all();

        $post = Post::findOrFail($id);

        
        $post->update($newPostData);
        
        $post->tags()->detach();
        $post->tags()->attach($newPostData["tags"]);

        return redirect()->route("admin.posts.index"); 
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

        return redirect()->route("admin.posts.index"); 
    }
}
