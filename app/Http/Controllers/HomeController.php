<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class HomeController extends Controller
{
    //
    public function index()
    {
        // Fetch posts from the database
        $posts = Post::orderBy('created_at', 'desc')->get();
        

        // Pass the posts to the view
        return view('home', ['posts' => $posts]);
    }
}
