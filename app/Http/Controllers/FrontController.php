<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front/home');
    }
    public function about(){
        return view('front/about');
    }
    public function category(){
        return view('front/category');
    }
    public function contact(){
        return view('front/contact');
    }
    public function single(){
        return view('front/single');
    }
}
