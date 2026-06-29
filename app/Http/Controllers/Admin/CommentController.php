<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        $comments = Comment::with(['user', 'post'])->latest()->paginate(15);

        return view('admin.comments.index', compact('comments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $validated['post_id'],
            'comment' => $validated['comment'],
        ]);

        return back()->with('status', 'Comment added successfully.');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return back()->with('status', 'Comment deleted successfully.');
    }
}
