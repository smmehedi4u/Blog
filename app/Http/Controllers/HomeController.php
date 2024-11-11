<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){

        $post = Post::all();

        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'admin') {
                return redirect()->route('admin.posts.index');
            } elseif ($usertype == 'user') {
                return redirect()->route('index');
            }
        }

        return view('home.homepage', compact('post'));
    }

    public function home(Post $post)
    {
        $post = Post::all();
        return view('home.homepage', compact('post'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function blog()
    {
        $posts = Post::all();
        return view('home.blogs', compact('posts'));
    }
}
