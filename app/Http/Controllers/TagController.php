<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        $data = Tag::all();
        return view('tag.index', ['tags' => $data, 'title' => 'Tags']);
    }


    function create()
    {
        Tag::create([
            'title' => 'Css',
        ]);
        return redirect('/tags');
    }
    function testmanytomany()
    {
        // $post1 = Post::find(1);
        // $post3 = Post::find(3);

        // $post1->tags()->attach([1, 2]);
        // $post3->tags()->attach([3]);

        // return response()->json([
        //     'post1_tags' => $post1->tags,
        //     'post3_tags' => $post3->tags,
        // ]);

        $tag = Tag::find(2);
        $tag->posts()->attach([3]);

        return response()->json([
            'tag' => $tag->title,
            'posts' => $tag->posts,
        ]);
    }
}
