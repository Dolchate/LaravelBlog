<?php

namespace App\Http\Controllers;

use App\Events\CategoryUsedEvent;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::with('category')->orderBy('updated_at', 'desc')->paginate(5);

        return view("posts.index", compact("posts"));

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        $category = Category::find($post->category_id);
        return view('posts.show', compact('post', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);

        $category = Category::find($post->category_id);
        event(new CategoryUsedEvent($category));


        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('success', 'Post created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($post->user_id != auth()->user()->id) {
            return redirect('/posts')->with('error', 'Unauthorized to update this post');
        }


        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');


        $post->save();

        return redirect('/posts/' . $post)->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            return redirect('/posts')->with('error', 'Unauthorized to delete this post');
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted successfully');
    }
}
