<?php

namespace App\Http\Controllers;

use App\Models\EmploymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentRecordController extends Controller
{
    public function index()
    {
        $employmentRecords = Auth::user()->employmentRecords()->get();
        return view('employment_records.index', compact('employmentRecords'));
    }

    public function create()
    {
        return view('employment_records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'organization' => 'required|string|max:255',
            'sector' => 'required|in:Government,Semi-Government,Private',
            'post' => 'required|string|max:255',
            'bps_tts' => 'nullable|string|max:50',
            'date_from' => 'required|date',
            'date_to' => 'nullable|date',
        ]);

        Auth::user()->employmentRecords()->create($request->all());

        return redirect()->route('employment-records.index')->with('success', 'Employment record created successfully.');
    }

    public function edit(EmploymentRecord $employmentRecord)
    {
        return view('employment_records.edit', compact('employmentRecord'));
    }

    public function update(Request $request, EmploymentRecord $employmentRecord)
    {
        $request->validate([
            'organization' => 'required|string|max:255',
            'sector' => 'required|in:Government,Semi-Government,Private',
            'post' => 'required|string|max:255',
            'bps_tts' => 'nullable|string|max:50',
            'date_from' => 'required|date',
            'date_to' => 'nullable|date',
        ]);

        $employmentRecord->update($request->all());

        return redirect()->route('employment-records.index')->with('success', 'Employment record updated successfully.');
    }

    public function destroy(EmploymentRecord $employmentRecord)
    {
        $employmentRecord->delete();
        return redirect()->route('employment-records.index')->with('success', 'Employment record deleted successfully.');
    }
}
