<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchProject;
use Illuminate\Support\Facades\Auth;

class ResearchProjectController extends Controller
{


    public function show(ResearchProject $researchProject)
    {
        return view('research_projects.show', compact('researchProject'));
    }



    public function index()
    {
        $projects = Auth::user()->researchProjects;
        return view('research_projects.index', compact('projects'));
    }

    public function create()
    {
        return view('research_projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'funding_agency' => 'required|string|max:255',
            'agency_level' => 'required|string|max:255',
            'co_pi_pi' => 'required|string|max:255',
            'worth' => 'required|numeric',
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'completion_date' => 'required|date',
        ]);

        Auth::user()->researchProjects()->create($request->all());

        return redirect()->route('research_projects.index');
    }

    public function edit(ResearchProject $researchProject)
    {
        return view('research_projects.edit', compact('researchProject'));
    }

    public function update(Request $request, ResearchProject $researchProject)
    {
        $request->validate([
            'funding_agency' => 'required|string|max:255',
            'agency_level' => 'required|string|max:255',
            'co_pi_pi' => 'required|string|max:255',
            'worth' => 'required|numeric',
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'completion_date' => 'required|date',
        ]);

        $researchProject->update($request->all());

        return redirect()->route('research_projects.index');
    }

    public function destroy(ResearchProject $researchProject)
    {
        $researchProject->delete();

        return redirect()->route('research_projects.index');
    }

}
