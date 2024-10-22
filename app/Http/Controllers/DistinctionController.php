<?php

namespace App\Http\Controllers;

use App\Models\Distinction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DistinctionController extends Controller
{
    public function index()
    {
        $distinctions = Auth::user()->distinctions;
        return view('distinctions.index', compact('distinctions'));
    }

    public function create()
    {
        return view('distinctions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'category' => 'required|in:National,International',
        ]);

        Auth::user()->distinctions()->create($request->all());

        return redirect()->route('distinctions.index')->with('success', 'Distinction added successfully.');
    }

    public function edit(Distinction $distinction)
    {
        return view('distinctions.edit', compact('distinction'));
    }

    public function update(Request $request, Distinction $distinction)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'category' => 'required|in:National,International',
        ]);

        $distinction->update($request->all());

        return redirect()->route('distinctions.index')->with('success', 'Distinction updated successfully.');
    }

    public function destroy(Distinction $distinction)
    {
        $distinction->delete();

        return redirect()->route('distinctions.index')->with('success', 'Distinction deleted successfully.');
    }
}
