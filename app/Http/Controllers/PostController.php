<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Ignition\ErrorPage\ErrorPageViewModel;

class PostController extends Controller
{
    public function index(){
        return view('blog',[
            'title'=>'All Posts',
            'post' => Post::latest()->get()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'title' => 'Post',
            'post' => $post
        ]);
    }
}
