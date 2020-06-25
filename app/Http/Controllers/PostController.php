<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_post(){
        $posts = Post::all();
        return view('admin.post.all_post',compact('posts'));
    }
    public function add_posts(){

    }
}
