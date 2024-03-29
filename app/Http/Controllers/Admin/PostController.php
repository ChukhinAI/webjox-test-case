<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages_count = 5;
        //$posts = Post::where('published', '=', '1')->orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate($pages_count);
        return view('admin.category.index', ['posts' => $posts, 'posts_per_page' => $pages_count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'post_text' => 'string|max:2000',
        ]);
        //dd($validated);

        $new_post = new Post();
        $new_post->id = Post::max('id') + 1; // разумеется, что под нагрузкой такой финт не пройдет, но уже чуть лучше
        $new_post->post_title = $request->title;
        $new_post->preview_img = $request->preview_img;
        $new_post->preview_img = $request->preview_img;
        $new_post->img = $request->img;
        $new_post->text = $request->post_text;
        //$new_post->cat_id = $request->post_cat; // ok
        $new_post->cat_id = $request->category_id; // ok
        $new_post->creator_id = $request->creator_id;
        //$pub_status = $request->publishing_status;
        //$new_post->published = ($pub_status == 0 || $pub_status == 1) ? $pub_status : 0; // если ввели не 0||1, то 0

        $new_post->published = $request->pub_status_select;
        //dd($pub_status_select);
        $new_post->save();

        //return $request->category_id;
        //dd($request->category_id);

        //return redirect()->back()->withSuccess("Пост был создан");
        return redirect()->back()->with("success", "новый пост создан!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //dd($post['cat_id']);
        return view('admin.category.edit', [
            'posts' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->cat_id = $request->cat_id;
        $post->published = $request->published;
        $post->preview_img = $request->preview_img;
        $post->save();

        return redirect()->back()->with('success', 'пост был успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'пост был успешно удален');
    }
}
