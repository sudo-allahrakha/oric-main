<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Auth;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Auth::user()->trainings;
        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organizer' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'institute' => 'required|string|max:255',
            'training_type' => 'required|in:National,International',
        ]);

        Auth::user()->trainings()->create($request->all());

        return redirect()->route('trainings.index')->with('success', 'Training created successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $request->validate([
            'organizer' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'institute' => 'required|string|max:255',
            'training_type' => 'required|in:National,International',
        ]);

        $training->update($request->all());

        return redirect()->route('trainings.index')->with('success', 'Training updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();

        return redirect()->route('trainings.index')->with('success', 'Training deleted successfully.');
   
    }
}
