<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Researcher Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                font-size: 10pt;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto p-4 bg-white shadow-lg rounded-lg mt-5">

        <div class="border-b pb-3 mb-4">
            <h1 class="text-lg font-bold text-gray-800">Researcher Profile</h1>
        </div>

        <div class="space-y-2 text-sm">
            <h2 class="text-base font-semibold text-gray-700">Personal Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                <div><strong>Name:</strong> {{ $basic->name}}</div>
                <div><strong>Email:</strong> {{ $basic->email}}</div>

                @if ($profile)
                    <div><strong>Contact:</strong> {{ $profile->contact}}</div>
                    <div><strong>Nationality:</strong> {{ $profile->nationality}}</div>
                    <div><strong>Academic Title / Designation:</strong> {{ $profile->academic_title}}</div>
                    <div><strong>Subject:</strong> {{ $profile->subject}}</div>
                    <div><strong>Specialization:</strong> {{ $profile->specialization}}</div>
                    <div><strong>Researcher ID / URL:</strong> <a href="{{ $profile->researcher_id}}"
                            class="text-indigo-500 underline">{{ $profile->researcher_id}}</a></div>
                    <div><strong>ORCID ID / URL:</strong> <a href="{{ $profile->orcid_id}}"
                            class="text-indigo-500 underline">{{ $profile->orcid_id}}</a></div>
                    <div><strong>Google Scholar Link:</strong> <a href="{{ $profile->google_scholar_link}}"
                            class="text-indigo-500 underline">{{ $profile->google_scholar_link}}</a></div>

                @endif


            </div>
            @if ($profile)
            <div class="mt-2"><strong>Biosketch:</strong> {{ $profile->biosketch}}</div>
            @endif
        </div>

        <!-- Education Record -->
        <div class="mt-6 space-y-2 text-sm">
            <h2 class="text-base font-semibold text-gray-700">Education Record</h2>
            <table class="min-w-full table-auto text-left border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2 py-1 border">Degree</th>
                        <th class="px-2 py-1 border">University</th>
                        <th class="px-2 py-1 border">Year</th>
                        <th class="px-2 py-1 border">Discipline</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($educationRecords->isNotEmpty())
                        @foreach ($educationRecords as $education)
                            <tr class="border-b">
                                <td class="px-2 py-1 border">{{ $education->degree }}</td>
                                <td class="px-2 py-1 border">{{ $education->university }}</td>
                                <td class="px-2 py-1 border">{{ $education->year }}</td>
                                <td class="px-2 py-1 border">{{ $education->discipline }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b">
                            <td class="px-2 py-1 border">No educational records found.</td>
                        </tr>
                        <p class="text-gray-500"></p>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Employment Record -->
        <div class="mt-6 space-y-2 text-sm">
            <h2 class="text-base font-semibold text-gray-700">Employment Record</h2>
            <table class="min-w-full table-auto text-left border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2 py-1 border">Organization</th>
                        <th class="px-2 py-1 border">Sector</th>
                        <th class="px-2 py-1 border">Post</th>
                        <th class="px-2 py-1 border">Date From</th>
                        <th class="px-2 py-1 border">Date To</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employmentRecords->isNotEmpty())
                        @foreach ($employmentRecords as $employment)
                            <tr class="border-b">
                                <td class="px-2 py-1 border">{{ $employment->organization }}</td>
                                <td class="px-2 py-1 border">{{ $employment->sector }}</td>
                                <td class="px-2 py-1 border">{{ $employment->post }}</td>
                                <td class="px-2 py-1 border">{{ $employment->date_from }}</td>
                                <td class="px-2 py-1 border">{{ $employment->date_to ?? 'Present' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b">
                            <td class="px-2 py-1 border">No employment records found.</td>
                        </tr>
                        <p class="text-gray-500"></p>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Distinctions -->
        <div class="mt-6 space-y-2 text-sm">
            <h2 class="text-base font-semibold text-gray-700">Distinctions</h2>
            <table class="min-w-full table-auto text-left border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2 py-1 border">Title</th>
                        <th class="px-2 py-1 border">Year</th>
                        <th class="px-2 py-1 border">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($distinctions->isNotEmpty())
                        @foreach ($distinctions as $distinction)
                            <tr class="border-b">
                                <td class="px-2 py-1 border">{{ $distinction->name }}</td>
                                <td class="px-2 py-1 border">{{ $distinction->year }}</td>
                                <td class="px-2 py-1 border">{{ $distinction->category }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b">
                            <td class="px-2 py-1 border">No distinctions found.</td>
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>


        <!-- Patents -->
        <div class="mt-6 space-y-2 text-sm">
            <h2 class="text-base font-semibold text-gray-700">Patents</h2>
            <table class="min-w-full table-auto text-left border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2 py-1 border">Title</th>
                        <th class="px-2 py-1 border">Patent #</th>
                        <th class="px-2 py-1 border">Inventor(s)</th>
                        <th class="px-2 py-1 border">Status</th>
                        <th class="px-2 py-1 border">Abstract</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($patents->isNotEmpty())
                        @foreach ($patents as $patent)
                            <tr class="border-b">
                                <td class="px-2 py-1 border">{{ $patent->patent_title }}</td>
                                <td class="px-2 py-1 border">{{ $patent->patent_number }}</td>
                                <td class="px-2 py-1 border">{{ $patent->inventors_name }}</td>
                                <td class="px-2 py-1 border">{{ $patent->patent_status }}</td>
                                <td class="px-2 py-1 border">{{ $patent->abstract }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b">
                            <td class="px-2 py-1 border">No patents found.</td>
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>

        <!-- Publications -->
          
        <div class="mt-6 space-y-2 text-sm">
            <h2 class="text-base font-semibold text-gray-700">Research Publications</h2>
            <table class="min-w-full table-auto text-left border">
                <thead>
                    <tr class="bg-gray-200">
                    <th class="px-2 py-1 border">Author</th>    
                    <th class="px-2 py-1 border">Title</th>
                        <th class="px-2 py-1 border">Journal Name</th>
                        <th class="px-2 py-1 border">Publishing year</th>
                        <th class="px-2 py-1 border">Journal Volume</th>
                        <th class="px-2 py-1 border">Impact factor</th>
                        <th class="px-2 py-1 border">DOI URL</th>
                        <th class="px-2 py-1 border">Journal Type</th>
                        <th class="px-2 py-1 border">HEC Recognized</th>
                        <th class="px-2 py-1 border">HRJS Category</th>
                    </tr>
                </thead>
                <tbody>

               
                    @if ($researchPublications->isNotEmpty())
                        @foreach ($researchPublications as $researchPublication)
                            <tr class="border-b">
                                <td class="px-2 py-1 border">{{ $researchPublication->author }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->title }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->journal_name }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->publishing_year }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->journal_volume }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->impact_factor }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->doi_url }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->journal_type }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->hec_recognized }}</td>
                                <td class="px-2 py-1 border">{{ $researchPublication->hrjs_category }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b">
                            <td class="px-2 py-1 border">No Research Publications found.</td>
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>
    </div>

</body>

</html>