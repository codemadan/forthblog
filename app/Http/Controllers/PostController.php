<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::query()
            ->select('Title', 'slug', 'id')
            ->orderBy('id')
            ->paginate(15);
//        dd($posts);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

//        dd($request->input('categories'));

        $category_ids = Category::find($request->input('categories'))
            ->pluck('id')->toArray();

        $post = new Post();
        $post->Title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->save();

        $post->categories()->attach($category_ids);

        return redirect(route('admin.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
//        dd($slug);
        $post = Post::query()
            ->where('slug', '=', $slug)
            ->first();
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $post = Post::query()
            ->where('slug', '=', $slug)
            ->first();

        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        $post = Post::query()
            ->where('slug', '=', $slug)
            ->first();
        $post->Title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->save();

        $post->categories()->sync($request->input('categories'));

        return redirect(route('admin.post.show', $post->slug));
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

    public function search( Request $request ){
        //dd($request->input('search'));
        $posts = Post::search($request->input('search'))->get();

        return view('post.index', compact('posts'));

    }
}
