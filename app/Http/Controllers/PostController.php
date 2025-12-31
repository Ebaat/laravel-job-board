<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $data = Post::cursorPaginate(3);
        return view('post.index', ['posts' => $data, 'title' => 'Blog']);
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'title' => $post->title]);
    }

    function create()
    {
        // $post = Post::create([
        //     'title' => 'New Post2',
        //     'body' => 'This is the second',
        //     'published' => true,
        //     'author' => 'Eb3at',
        // ]);

        Post::factory()->count(100)->create();

        return redirect('/blog');
    }
    function delete()
    {
        Post::destroy(2);
    }
}
