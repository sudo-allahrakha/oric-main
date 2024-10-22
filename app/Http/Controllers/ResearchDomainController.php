<?php

namespace App\Http\Controllers;

use App\Models\ResearchDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearchDomainController extends Controller
{
    public function index()
    {
        $researchDomains = Auth::user()->researchDomains;
        return view('research_domains.index', compact('researchDomains'));
    }

    public function create()
    {
        return view('research_domains.create');
    }

    public function store(Request $request)
    {
        // Decode the JSON strings to arrays (if they are JSON-encoded strings)
        $decodedKeywords = json_decode($request->input('keywords'), true);
        $decodedSDGs = json_decode($request->input('targeted_sdg'), true);

        // Manually replace the input fields to ensure they are arrays before validation
        $request->merge([
            'keywords' => $decodedKeywords,
            'targeted_sdg' => $decodedSDGs,
        ]);

        // Validate the input
        $request->validate([
            'research_area' => 'required|string|max:255',
            'keywords' => 'required|array|min:5', // Ensure it's an array with minimum 5 items
            'targeted_sdg' => 'required|array|min:1', // Ensure it's an array with at least 1 item
        ]);

        // Save the research domain with the keywords and targeted SDGs
        Auth::user()->researchDomains()->create([
            'research_area' => $request->research_area,
            'keywords' => $request->keywords, // Store decoded array of keywords
            'targeted_sdg' => $request->targeted_sdg, // Store decoded array of SDGs
        ]);

        return redirect()->route('research-domains.index')->with('success', 'Research domain added successfully!');
    }

    public function edit(ResearchDomain $researchDomain)
    {

        return view('research_domains.edit', compact('researchDomain'));
    }

    public function update(Request $request, ResearchDomain $researchDomain)
    {
        // Decode the JSON strings to arrays (if they are JSON-encoded strings)
        $decodedKeywords = json_decode($request->input('keywords'), true);
        $decodedSDGs = json_decode($request->input('targeted_sdg'), true);

        // Manually replace the input fields to ensure they are arrays before validation
        $request->merge([
            'keywords' => $decodedKeywords,
            'targeted_sdg' => $decodedSDGs,
        ]);

        // Validate the input
        $request->validate([
            'research_area' => 'required|string|max:255',
            'keywords' => 'required|array|min:5', // Ensure it's an array with minimum 5 items
            'targeted_sdg' => 'required|array|min:1', // Ensure it's an array with at least 1 item
        ]);

        // Update the research domain with the keywords and targeted SDGs
        $researchDomain->update([
            'research_area' => $request->research_area,
            'keywords' => $request->keywords, // Store decoded array of keywords
            'targeted_sdg' => $request->targeted_sdg, // Store decoded array of SDGs
        ]);

        return redirect()->route('research-domains.index')->with('success', 'Research domain updated successfully!');
    }

    public function destroy(ResearchDomain $researchDomain)
    {

        $researchDomain->delete();
        return redirect()->route('research-domains.index')->with('success', 'Research domain deleted successfully!');
    }
}
