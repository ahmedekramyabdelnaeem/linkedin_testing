<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\JobListing;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'jobs' => JobListing::count(),
            'posts' => Post::count(),
            'comments' => Comment::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
