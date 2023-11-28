<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(2);

        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

        return view('categories.show', compact('category'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'color' => 'required|string|max:7',
        ]);

        $category = auth()->user()->categories()->create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);

        $category->save();

        return redirect('/categories')->with('success', 'Category created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $category = Category::find($id);

        $category->name = $request->input('name');

        $category->save();

        return redirect('/categories/' . $id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $posts = Post::All();
        foreach ($posts as $post) {
            if ($post->category_id == $category->id) {
                $post->category_id = 3;
                $post->save();
            }
        }

        $category->delete();

        return redirect('/categories');
    }
}
