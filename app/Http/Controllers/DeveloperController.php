<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isManager')) {
            $developers = Developer::all();
            return view('developer.index', compact('developers'));
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
            return view('developer.create', compact('managers'));
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
            'devName' =>'required|min:4|string|max:255',
            'devId'=>'required|min:4|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'email' => 'required|min:10|string|max:255',
            'contactNum' => 'required|Numeric',
            'manager_id' => 'required|exists:managers,id',
        ]);
        // Get the developer's ID from the users table based on the provided email
        // find a user whose email matches the email provided in the request ($request->email).
        // The ->first() method is used to retrieve the first matching record.
        $developerUser = User::where('email', $request->email)->first();

        if (!$developerUser) {
            return redirect()->route('developer.index')->withError('Developer not found.');
        }

        $developer = new Developer;
        $developer->devId = $request->devId;
        $developer->devName = $request->devName;
        $developer->status = $request->status;
        $developer->email = $request->email;
        $developer->contactNum = $request->contactNum;
        $developer->manager_id = $request->manager_id;
        $developer->user_id = $developerUser->id; // Associate the user_id from the users table
        $developer->save();

        return redirect()->route('developer.index')
            ->withSuccess('New developer record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        if (auth()->user()->can('view', Manager::class)) {
            //loads the 'managers' relationship on the $developer model.
            // There's a relationship named 'managers' defined on the Developer model.
            $developer = $developer->load('managers');
            return view('developer.show', compact('developer'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        if (auth()->user()->can('update', Manager::class)) {
            $managers = Manager::all();
            return view('developer.edit', compact('developer', 'managers'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $validated = $request->validate([
            'devName' =>'required|min:4|string|max:255',
            'devId'=>'required|min:4|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'email' => 'required|min:10|string|max:255',
            'contactNum' => 'required|Numeric',
            'manager_id' => 'required|exists:managers,id',
        ]);

        $developer->update([
            'devName' => $request->devName,
            'devId' => $request->devId,
            'status' => $request->status,
            'email' => $request->email,
            'contactNum' => $request->contactNum,
            'manager_id' => $request->manager_id,
        ]);


        return redirect()->route('developer.index')
            ->withSuccess('Developer record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        if (auth()->user()->can('delete', Manager::class)) {
            $developer->delete();
            return redirect()->route('developer.index')
                ->withSuccess('Developer record deleted successfully.');
        }
        else{
            abort(403);
        }
    }
}
