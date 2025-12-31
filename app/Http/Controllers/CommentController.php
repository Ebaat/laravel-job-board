<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Dom\Comment as DomComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index()
    {
        $data = comment::all();
        return view('comment.index', ['comments' => $data, 'title' => 'Blog']);
    }



    function create()
    {
        // $post = comment::create([

        //     'content' => 'fokak',
        //     'post_id' => 2,
        //     'author' => 'Eb3at',
        // ]);
        comment::factory()->count(50)->create();
        return redirect('/comments');
    }
}
