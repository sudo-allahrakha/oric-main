<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ResearchPublication;
use Illuminate\Support\Facades\Auth;

class ResearchPublicationController extends Controller
{
   
    public function show(ResearchPublication $researchPublication)
    {
        return view('research_publications.show', compact('researchPublication'));
    }

   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Auth::user()->researchPublications;
        return view('research_publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('research_publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'nullable|string',
            'title' => 'required|string',
            'journal_name' => 'required|string',
            'publishing_year' => 'required|integer',
            'journal_volume' => 'nullable|string',
            'impact_factor' => 'nullable|string',
            'doi_url' => 'nullable|string',
            'journal_type' => 'nullable|in:National,International',
            'hec_recognized' => 'nullable|boolean',
            'hrjs_category' => 'nullable|string',
        ]);

        Auth::user()->researchPublications()->create($request->all());

        return redirect()->route('research_publications.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResearchPublication $researchPublication)
    {
        return view('research_publications.edit', compact('researchPublication'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResearchPublication $researchPublication)
    {
        $request->validate([
           'author' => 'nullable|string',
            'title' => 'required|string',
            'journal_name' => 'required|string',
            'publishing_year' => 'required|integer',
            'journal_volume' => 'nullable|string',
            'impact_factor' => 'nullable|string',
            'doi_url' => 'nullable|string',
            'journal_type' => 'nullable|in:National,International',
            'hec_recognized' => 'nullable|boolean',
            'hrjs_category' => 'nullable|string',
        ]);

        $researchPublication->update($request->all());

        return redirect()->route('research_publications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResearchPublication $researchPublication)
    {
        $researchPublication->delete();

        return redirect()->route('research_publications.index');
    }
}
