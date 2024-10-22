<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Education;
use App\Models\EmploymentRecord;
use App\Models\Distinction;
use App\Models\Patent;
use App\Models\ResearchDomain;
use App\Models\ResearchProject;
use App\Models\ResearchPublication;
use App\Models\ResearchAbstract;

use Auth;

class ProfileController extends Controller
{


    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            // Fetch profiles for users that do not have the 'admin' role
            $profiles = Profile::whereHas('user', function ($query) {
                $query->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'admin');
                });
            })->with('user')->get();

            // Pass the profiles to the view
            return view('profile.index', compact('profiles'));
        } else {
            return abort(403, 'You do not have access.');
        }

    }

    public function detail($id)
    {

        if (Auth::user()->hasRole('admin')) {

            $basic = User::where('id', $id)->first();
            $profile = Profile::where('user_id', $id)->first();
            $educationRecords = Education::where('user_id', $id)->get();
            $employmentRecords = EmploymentRecord::where('user_id', $id)->get();
            $distinctions = Distinction::where('user_id', $id)->get();
            $patents = Patent::where('user_id', $id)->get();
            $researchDomains = ResearchDomain::where('user_id', $id)->get();
            $researchProjects = ResearchProject::where('user_id', $id)->get();
            $researchPublications = ResearchPublication::where('user_id', $id)->get();
            $researchAbstracts = ResearchAbstract::where('user_id', $id)->get();


            return view('profile.detail', compact(
                'basic',
                'profile',
                'educationRecords',
                'employmentRecords',
                'distinctions',
                'patents',
                'researchDomains',
                'researchProjects',
                'researchPublications',
                'researchAbstracts'
            ));
        } else {
            return abort(403, 'You do not have access.');
        }

    }



    public function edit()
    {
        $profile = Auth::user()->profile;

        if (!$profile) {
            // Create a new profile if it does not exist
            $profile = new Profile;
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'academic_title' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'research_area' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'researcher_id' => 'nullable|string|max:255',
            'orcid_id' => 'nullable|string|max:255',
            'google_scholar_link' => 'nullable|url|max:255',
            'contact' => 'nullable|string|max:255',
            'biosketch' => 'nullable|string|max:2000',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            // Create a new profile
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->fill($request->all());
            $profile->save();
        } else {
            // Update the existing profile
            $profile->update($request->all());
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
