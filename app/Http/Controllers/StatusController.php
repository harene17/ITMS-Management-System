<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Project;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $statuses = Status::all();
         return view('status.index', compact('statuses'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $this->authorize('create', [Status::class, $project]);
        return view('status.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'ProgressDate' => 'required|date',
            'status' => 'required|in:ahead_of_schedule,on_schedule,delayed,completed',
            'description' => 'required|string',
        ]);

        $this->authorize('create', [Status::class, Project::findOrFail($request->project_id)]);

        $status = new Status;
        $status->project_id = $request->project_id;
        $status->ProgressDate = $request->ProgressDate;
        $status->status = $request->status;
        $status->description = $request->description;
        $status->save();

        return redirect()->route('status.show', ['project' => $request->project_id])
            ->withSuccess('Status updated successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Project $project)
    {
        // Authorize the user to view the project
        $this->authorize('view', $project);

        // Retrieve statuses after authorization
        $statuses = $project->statuses;

        return view('status.show', compact('project', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }
}
