<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View
    {
        $jobs = JobListing::with('company')->latest()->paginate(15);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function destroy(JobListing $job): RedirectResponse
    {
        $job->delete();

        return back()->with('status', 'Job listing deleted successfully.');
    }
}
