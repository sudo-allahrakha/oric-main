<!-- resources/views/research_publications/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Research Publication') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">



                    @if ($errors->any())
                        <div class="rounded-md bg-red-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul role="list" class="list-disc space-y-1 pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif




                    <form action="{{ route('research_publications.update', $researchPublication) }}" method="POST">
                        @csrf
                        @method('PUT')
                   
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="author">
                                Author/Corresponding author
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="text" name="author" id="author"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                value="{{$researchPublication->author}}"
                                required>
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Title
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="text" name="title" id="title"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                value="{{$researchPublication->title}}"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="journal_name">
                                Journal name
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="text" name="journal_name" id="journal_name"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                value="{{$researchPublication->journal_name}}"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="publishing_year">
                                Publishing Year
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="number" name="publishing_year" id="publishing_year"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required min="2000" max="2024"
                                value="{{$researchPublication->publishing_year}}"
                                >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="journal_volume">
                                Journal Volume
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="text" name="journal_volume" id="journal_volume"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required
                                value="{{$researchPublication->journal_volume}}"
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="impact_factor">
                                Impact Factor
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="text" name="impact_factor" id="impact_factor"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required
                                value="{{$researchPublication->impact_factor}}"
                                >
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="doi_url">
                                DOI URL
                                <span class="text-red-700">*</span>
                            </label>
                            <input type="text" name="doi_url" id="doi_url"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required
                                value="{{$researchPublication->doi_url}}"
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="journal_type">
                                Journal Type
                                <span class="text-red-700">*</span>
                            </label>
                            <select type="text" name="journal_type" id="journal_type"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required>
                                <option value="National">National</option>
                                <option value="International">International</option>
                            </select>
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="hec_recognized">
                                HEC Recognized
                                <span class="text-red-700">*</span>
                            </label>
                            <select type="text" name="hec_recognized" id="hec_recognized"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>




                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="hrjs_category">
                                HRJS Category
                                <span class="text-red-700">*</span>
                            </label>
                            <select type="text" name="hrjs_category" id="hrjs_category"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                required>
                                <option value="W">W</option>
                                <option value="X">X</option>
                                <option value="Y">Y</option>
                            </select>
                        </div>

                        
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
