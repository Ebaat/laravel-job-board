<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comment::paginate(5);
        return view('comment.index', ['comments' => $comments, 'title' => 'Blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create', ['title' => 'Create Comment']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment = new comment();
        $comment->post_id = $request->input('post_id');
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->save();

        $post = Post::findOrFail($request->input('post_id'));

        return redirect("/blog/{$post->id}")->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment, 'title' => 'Comment Detail']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $comment = comment::findOrFail($id);
        return view('comment.edit', ['comment' => $comment, 'title' => 'Edit Comment']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
