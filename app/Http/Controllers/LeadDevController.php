<?php

namespace App\Http\Controllers;

use App\Models\LeadDev;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LeadDevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isManager')) {
            $leadDev = LeadDev::all();
            return view('leadDev.index', compact('leadDev'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('create', Manager::class)) {
            $managers = Manager::all();
            return view('leadDev.create', compact('managers'));
        }
        else{
            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'leadName' =>'required|min:4|string|max:255',
            'leadId'=>'required|min:4|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'email' => 'required|min:10|string|max:255',
            'contactNum' => 'required|Numeric',
            'manager_id' => 'required|exists:managers,id',
        ]);

        $leadUser = User::where('email', $request->email)->first();

        if (!$leadUser) {
            return redirect()->route('developer.index')->withError('Developer not found.');
        }
        $leadDev = new LeadDev;
        $leadDev->leadName = $request->leadName;
        $leadDev->leadId = $request->leadId;
        $leadDev->status = $request->status;
        $leadDev->email = $request->email;
        $leadDev->contactNum = $request->contactNum;
        $leadDev->manager_id = $request ->manager_id;
        $leadDev->user_id = $leadUser->id;
        $leadDev->save();

        return redirect()->route('leadDev.index')
            ->withSuccess('New lead developer record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadDev $leadDev)
    {
        if (auth()->user()->can('view', Manager::class)) {
            $leadDev = $leadDev->load('managers');
            return view('leadDev.show', compact('leadDev'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadDev $leadDev)
    {
        if (auth()->user()->can('update', Manager::class)) {
            $managers = Manager::all();
            return view('leadDev.edit', compact('leadDev', 'managers'));
        }
        else{
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadDev $leadDev)
    {
        $validated = $request->validate([
            'leadName' =>'required|min:4|string|max:255',
            'leadId'=>'required|min:4|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'email' => 'required|min:10|string|max:255',
            'contactNum' => 'required|Numeric',
            'manager_id' => 'required|exists:managers,id',
        ]);

        $leadDev->update([
        'leadName' => $request->leadName,
        'leadId' => $request->leadId,
        'status' => $request->status,
        'email' => $request->email,
        'contactNum'=> $request->contactNum,
        'manager_id' => $request ->manager_id,
        ]);

        return redirect()->route('leadDev.index')
            ->withSuccess('Lead developer record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadDev $leadDev)
    {
        if (auth()->user()->can('delete', Manager::class)) {
            $leadDev->delete();
            return redirect()->route('leadDev.index')
                ->withSuccess('Lead developer record deleted successfully.');
        }
        else{
            abort(403);
        }
    }
}
