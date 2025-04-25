<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class JobController extends Controller
{
    public function index()
    {
        $jobs = \App\Models\Job::where('user_id', Auth::id())->get();

        return view('jobs.index', compact('jobs'));
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'location' => 'nullable',
            'date_applied' => 'nullable|date',
            'status' => 'nullable',
            'source_link' => 'nullable|url',
        ]);

        $request->merge(['user_id' => Auth::id()]);

        \App\Models\Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job added successfully.');
    }


    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
        ]);

        $job->update($request->all());
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
