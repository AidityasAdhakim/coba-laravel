<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('categories',[
            'title' => 'Categories',
            'categories'=>Category::all()
        ]);
    }

    public function categoryPost(Category $category){
        return view('blog',[
            'title' => "Post by Category : $category->name",
            'post' => $category->post->load('author','category')
        ]);
    } 
}
