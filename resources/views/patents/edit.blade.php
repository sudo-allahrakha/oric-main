<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Patent') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('patents.update', $patent->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="patent_title" class="block text-gray-700">Patent Title</label>
                            <input type="text" name="patent_title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                   value="{{ old('patent_title', $patent->patent_title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="patent_number" class="block text-gray-700">Patent Number</label>
                            <input type="text" name="patent_number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                   value="{{ old('patent_number', $patent->patent_number) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="inventors_name" class="block text-gray-700">Inventor(s) Name</label>
                            <input type="text" name="inventors_name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                   value="{{ old('inventors_name', $patent->inventors_name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="patent_status" class="block text-gray-700">Patent Status</label>
                            <select name="patent_status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="Pending" {{ old('patent_status', $patent->patent_status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Granted" {{ old('patent_status', $patent->patent_status) == 'Granted' ? 'selected' : '' }}>Granted</option>
                                <option value="Expired" {{ old('patent_status', $patent->patent_status) == 'Expired' ? 'selected' : '' }}>Expired</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="abstract" class="block text-gray-700">Abstract</label>
                            <textarea name="abstract" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>{{ old('abstract', $patent->abstract) }}</textarea>
                        </div>

                        <button type="submit" class="bg-gray-800 text-white font-bold py-2 px-4 rounded">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
