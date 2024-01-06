<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Developer;
use App\Models\LeadDev;
use App\Models\Manager;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Project::class);
        $managers = Manager::all();
        $leadDev = LeadDev::all();
        $developers = Developer::all();
        return view('project.create', compact('managers','leadDev', 'developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'projName' =>'required|min:4|string|max:255',
            'projId'=>'required|min:4|string|max:255',
            'owner'=>'required|min:4|string|max:255',
            'PIC' =>'required|min:4|string|max:255',
            'StartDate' =>'required|date',
            'EndDate' =>'required|date',
            'Duration' => 'required|min:4|string|max:255',
            'Methodology' =>'required|min:4|string|max:255',
            'Platform' =>'required|min:4|string|max:255',
            'Deployment' =>'required|min:4|string|max:255',
            'manager_id' => 'required|exists:managers,id',
            'leadDev_id' => 'required|exists:lead_devs,id',
            'developers' => 'array',
            'developers.*' => 'exists:developers,id',
        ]);

        $project = new Project;
        $project->projName = $request->projName;
        $project->projId = $request->projId;
        $project->owner = $request->owner;
        $project->PIC = $request->PIC;
        $project->StartDate = $request->StartDate;
        $project->EndDate = $request->EndDate;
        $project->Duration = $request->Duration;
        $project->Methodology = $request->Methodology;
        $project->Platform = $request->Platform;
        $project->Deployment = $request->Deployment;
        $project->manager_id = $request->manager_id;
        $project->leadDev_id = $request->leadDev_id;
        $project->save();

        $project->developers()->attach($request->input('developers', []));

        return redirect()->route('project.index')
            ->withSuccess('New project record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        $managers = Manager::all();
        $leadDev = LeadDev::all();
        $developers = Developer::all();
        return view('project.edit', compact('project','leadDev', 'managers' ,'developers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'projName' =>'required|min:4|string|max:255',
            'projId'=>'required|min:4|string|max:255',
            'owner'=>'required|min:4|string|max:255',
            'PIC' =>'required|min:4|string|max:255',
            'StartDate' =>'required|date',
            'EndDate' =>'required|date',
            'Duration' => 'required|min:4|string|max:255',
            'Methodology' =>'required|min:4|string|max:255',
            'Platform' =>'required|min:4|string|max:255',
            'Deployment' =>'required|min:4|string|max:255',
            'manager_id' => 'required|exists:managers,id',
            'leadDev_id' => 'required|exists:lead_devs,id',
            'developers' => 'array',
            'developers.*' => 'exists:developers,id',
        ]);

        $project->update([
            'projName' => $request->projName,
            'projId' => $request->projId,
            'owner' => $request->owner,
            'PIC' => $request->PIC,
            'StartDate' => $request->StartDate,
            'EndDate' => $request->EndDate,
            'Duration' => $request ->Duration,
            'Methodology' => $request->Methodology,
            'Platform' => $request->Platform,
            'Deployment' => $request->Deployment,
            'manager_id' => $request->manager_id,
            'leadDev_id' => $request->leadDev_id,
        ]);
        $project->developers()->sync($request->input('developers', []));

        return redirect()->route('project.index')
            ->withSuccess('Project record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return redirect()->route('project.index')
            ->withSuccess('Project record deleted successfully.');
    }
}
