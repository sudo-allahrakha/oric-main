<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Auth;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Auth::user()->education;
        return view('education.index', compact('educations'));
    }

    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'year' => 'required|integer',
            'discipline' => 'required|string|max:255',
        ]);

        $education = new Education($validatedData);
        $education->user_id = Auth::id();
        $education->save();

        return redirect()->route('education.index')->with('success', 'Education added successfully.');
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'year' => 'required|integer',
            'discipline' => 'required|string|max:255',
        ]);

       
        $education->update($validatedData);


        return redirect()->route('education.index')->with('success', 'Education updated successfully.');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education deleted successfully.');
    }
}
