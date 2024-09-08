<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User ; 

use Illuminate\Http\Request;

class PostController extends Controller
{
    

    public function index(){
        $title = '' ; 
        if (request('category')) {
            $category = Category::firstWhere('slug' , request('category')) ; 
            $title = ' in ' . $category->name  ; 
        }

        if (request('author')) {
            $category = User::firstWhere('username' , request('author')) ; 
            $title = ' by ' . $category->name  ; 
        }

        return view('blog',[
            "title" => "All Post" . $title, 
            "blogs" => Post::with(['user', 'category'])->latest()->filter( request([ 'search', 'category' ,'author']) )->paginate(7)->withQueryString() 
        ]);
    } 

    

    public function detail(Post $post){
        return view('detail',[
            "title" => "Detail Blog",
            "posts" => $post 
        ]);
    }
}


