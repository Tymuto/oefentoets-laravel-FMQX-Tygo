<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->get();

        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'content' => 'required',
        ]);
        $post = auth()->user()->posts()->create([
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('forum.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('forum.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update([
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('forum.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('forum.index')->with('success', 'Post deleted successfully!');
    }

    public function show(Post $post)
    {
        return view('show-post', compact('post'));
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        return redirect()->route('forum.index', $post->id)->with('success', 'Comment added successfully!');
    }
}
