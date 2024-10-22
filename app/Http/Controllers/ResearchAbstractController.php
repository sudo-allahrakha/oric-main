<?php

namespace App\Http\Controllers;

use App\Models\ResearchAbstract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearchAbstractController extends Controller
{
    public function index()
    {
        $abstracts = Auth::user()->researchAbstracts()->get();
        return view('abstracts.index', compact('abstracts'));
    }

    public function create()
    {
        return view('abstracts.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'name_of_conference' => 'required',
            'date' => 'required|date',
            'page_no' => 'required|integer',
            'publication_type' => 'required|in:National,International',
            'category' => 'required|in:Oral presentation,Post,Presentation',
        ]);

        try {
            Auth::user()->researchAbstracts()->create($request->all());

            return redirect()->route('research_abstracts.index')->with('success', 'Abstract created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            print_r($e->getMessage());
            \Log::error('Error storing abstract: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Failed to create abstract. Please try again later.']);
        }

    }

    public function edit(ResearchAbstract $researchAbstract)
    {
       
        return view('abstracts.edit', compact('researchAbstract'));
    }

    public function update(Request $request, ResearchAbstract $researchAbstract)
    {
        $request->validate([
            'title' => 'required',
            'name_of_conference' => 'required',
            'date' => 'required|date',
            'page_no' => 'required|integer',
            'publication_type' => 'required|in:National,International',
            'category' => 'required|in:Oral presentation,Post,Presentation',
        ]);

        try{
            $researchAbstract->update($request->all());

        return redirect()->route('research_abstracts.index')->with('success', 'Abstract updated successfully.');
   

        } catch (\Exception $e) {
            // Log the error for debugging purposes
            print_r($e->getMessage());
            exit();
            \Log::error('Error storing abstract: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Failed to update abstract. Please try again later.']);
        }
         }

    public function destroy(ResearchAbstract $researchAbstract)
    {
        $researchAbstract->delete();
        return redirect()->route('research_abstracts.index')->with('success', 'Abstract deleted successfully.');
    }
}
