<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Abstract') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('research_abstracts.update', $researchAbstract) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-gray-700">Title</label>
                                <input type="text" name="title" value="{{ $researchAbstract->title }}"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                            </div>

                            <div>
                                <label class="block text-gray-700">Conference Name</label>
                                <input type="text" name="name_of_conference"
                                    value="{{ $researchAbstract->name_of_conference }}"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                            </div>

                            <div>
                                <label class="block text-gray-700">Date</label>
                                <input type="date" name="date" value="{{ $researchAbstract->date }}"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                            </div>

                            <div>
                                <label class="block text-gray-700">Page No.</label>
                                <input type="text" name="page_no" value="{{ $researchAbstract->page_no }}"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                            </div>

                            <div>
                                <label class="block text-gray-700">Publication Type</label>
                                <select name="publication_type"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="National"
                                        {{ $researchAbstract->publication_type == 'National' ? 'selected' : '' }}>
                                        National</option>
                                    <option value="International"
                                        {{ $researchAbstract->publication_type == 'International' ? 'selected' : '' }}>
                                        International</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700">Category</label>
                                <select name="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="Oral presentation"
                                        {{ $researchAbstract->category == 'Oral presentation' ? 'selected' : '' }}>Oral
                                        presentation</option>
                                    <option value="Post"
                                        {{ $researchAbstract->category == 'Post' ? 'selected' : '' }}>Post</option>
                                    <option value="Presentation"
                                        {{ $researchAbstract->category == 'Presentation' ? 'selected' : '' }}>
                                        Presentation</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
