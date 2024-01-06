<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isManager')){
        $managers = Manager::all();
        return view('manager.index', compact('managers'));
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
            return view('manager.create');
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
            'managerName' =>'required|min:4|string|max:255',
            'managerId'=>'required|min:4|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'email' => 'required|min:10|string|max:255',
            'contactNum' => 'required|Numeric'
        ]);

        $manager = new Manager;
        $manager->managerName = $request->managerName;
        $manager->managerId = $request->managerId;
        $manager->status = $request->status;
        $manager->email = $request->email;
        $manager->contactNum = $request->contactNum;
        $manager->save();

        return redirect()->route('manager.index')
            ->withSuccess('New manager record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        if(auth()->user()->can('view', Manager::class)) {
            return view('manager.show', compact('manager'));
        }
        else{
           abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        if(auth()->user()->can('update', Manager::class)) {
            return view('manager.edit', compact('manager'));
        }
        else{
          abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        $validated = $request->validate([
            'managerName' =>'required|min:4|string|max:255',
            'managerId'=>'required|min:4|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'email' => 'required|min:10|string|max:255',
            'contactNum' => 'required|Numeric'
        ]);

        $manager->update([
            'managerName' => $request->managerName,
            'managerId' => $request->managerId,
            'status' => $request->status,
            'email' => $request->email,
            'contactNum' => $request->contactNum,
        ]);

        return redirect()->route('manager.index')
            ->withSuccess('Manager record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        if(auth()->user()->can('delete', Manager::class)) {
            $manager->delete();
            return redirect()->route('manager.index')
                ->withSuccess('Manager record deleted successfully.');
        }
        else{
            abort(403);
        }
    }
}
