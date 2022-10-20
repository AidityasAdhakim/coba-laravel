<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Ignition\ErrorPage\ErrorPageViewModel;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $title = "";
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }

        return view('blog',[
            'title'=>'All Posts' . $title,
            'post' => Post::latest()->filter(request(['search', 'category','author']))->get()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'title' => 'Post',
            'post' => $post
        ]);
    }
}
