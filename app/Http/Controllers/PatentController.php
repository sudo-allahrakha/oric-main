<?php

namespace App\Http\Controllers;

use App\Models\Patent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatentController extends Controller
{
    public function index()
    {
        $patents = Auth::user()->patents;
        return view('patents.index', compact('patents'));
    }

    public function create()
    {
        return view('patents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patent_title' => 'required',
            'patent_number' => 'required|unique:patents,patent_number',
            'inventors_name' => 'required',
            'patent_status' => 'required|in:Pending,Granted,Expired',
            'abstract' => 'required',
        ]);

        Auth::user()->patents()->create($request->all());

        return redirect()->route('patents.index')->with('success', 'Patent created successfully.');
    }

    public function edit(Patent $patent)
    {
        return view('patents.edit', compact('patent'));
    }

    public function update(Request $request, Patent $patent)
    {
        $request->validate([
            'patent_title' => 'required',
            'patent_number' => 'required|unique:patents,patent_number,' . $patent->id,
            'inventors_name' => 'required',
            'patent_status' => 'required|in:Pending,Granted,Expired',
            'abstract' => 'required',
        ]);

        $patent->update($request->all());

        return redirect()->route('patents.index')->with('success', 'Patent updated successfully.');
    }

    public function destroy(Patent $patent)
    {
        $patent->delete();

        return redirect()->route('patents.index')->with('success', 'Patent deleted successfully.');
    }
}
