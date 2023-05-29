<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    public function index()
    {
        $posts_published = Post::where('published', '=', '1' )->count(); // 1 == true
        $users_registrated = User::all()->count();
        $posts_in_progress = Post::where('published', '=', '0')->count();
        //$posts_count = Post::all();
        //$users = User::where('id', '>', 1)->get(); // ok
        //dd($posts_published);
        //dd($posts_published);
        return view('admin.home.index', [
            'posts_published' => $posts_published,
            'users_registrated' => $users_registrated,
            'posts_in_progress' => $posts_in_progress,
        ]);
    }
}
