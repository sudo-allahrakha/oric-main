<!-- resources/views/profile/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- content --}}
                    
                        
                            @if (session('success'))
                                <div
                                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block text-gray-700">Academic Title / Designation <span class="text-red-700">*</span></label>
                                        <input type="text" name="academic_title"
                                            value="{{ $profile->academic_title ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                            
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Subject/Major <span class="text-red-700">*</span></label>
                                        <input type="text" name="subject" value="{{ $profile->subject ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Specialization <span class="text-red-700">*</span></label>
                                        <input type="text" name="specialization"
                                            value="{{ $profile->specialization ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Research Area <span class="text-red-700">*</span></label>
                                        <input type="text" name="research_area"
                                            value="{{ $profile->research_area ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                    </div>
                                    

                                    <div class="mt-4">
                                        <label for="nationality" class="block font-medium text-sm text-gray-700">Nationality</label>
                                        <div class="mt-1">
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio" name="nationality" value="single" {{ old('nationality', $profile->nationality) == 'single' ? 'checked' : '' }}>
                                                <span class="ml-2">Single</span>
                                            </label>
                                            <label class="inline-flex items-center ml-6">
                                                <input type="radio" class="form-radio" name="nationality" value="dual" {{ old('nationality', $profile->nationality) == 'dual' ? 'checked' : '' }}>
                                                <span class="ml-2">Dual</span>
                                            </label>
                                        </div>
                                    </div>


                                    <div>
                                        <label class="block text-gray-700">Researcher ID/URL</label>
                                        <input type="text" name="researcher_id"
                                            value="{{ $profile->researcher_id ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">ORCID ID/URL</label>
                                        <input type="text" name="orcid_id" value="{{ $profile->orcid_id ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Google Scholar Link</label>
                                        <input type="text" name="google_scholar_link"
                                            value="{{ $profile->google_scholar_link ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Contact # <span class="text-red-700">*</span></label>
                                        <input type="text" name="contact" value="{{ $profile->contact ?? '' }}"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Biosketch</label>
                                        <textarea name="biosketch" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">{{ $profile->biosketch ?? '' }}</textarea>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">Update</button>
                                    </div>
                                </div>
                            </form>
                       
                    {{-- end content --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
