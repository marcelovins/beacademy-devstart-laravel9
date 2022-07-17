<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    // public function __construct() 
    // {
    //     $this->middleware('log.access');
    // }

    protected $user;
    protected $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();

        return view('posts.index', compact('posts'));
    }

    public function show($userId)
    {
        if(!$user = $this->user->find($userId))
            return redirect->back();
        
        $posts = $user->posts()->get();

        return view('posts.show', compact('user', 'posts'));
    }
}
