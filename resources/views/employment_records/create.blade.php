<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Employment Record') }}
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

                    <form action="{{ route('employment-records.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="organization" class="block text-gray-700">Organization</label>
                            <input type="text" name="organization" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                value="{{ old('organization') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="sector" class="block text-gray-700">Sector</label>
                            <select name="sector" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Select Sector</option>
                                <option value="Government" {{ old('sector') == 'Government' ? 'selected' : '' }}>
                                    Government
                                </option>
                                <option value="Semi-Government"
                                    {{ old('sector') == 'Semi-Government' ? 'selected' : '' }}>
                                    Semi-Government</option>
                                <option value="Private" {{ old('sector') == 'Private' ? 'selected' : '' }}>Private
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="post" class="block text-gray-700">Post</label>
                            <input type="text" name="post" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" value="{{ old('post') }}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="bps_tts" class="block text-gray-700">BPS/TTS (if applicable)</label>
                            <input type="text" name="bps_tts" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" value="{{ old('bps_tts') }}">
                        </div>

                        <div class="mb-4">
                            <label for="date_from" class="block text-gray-700">Date From</label>
                            <input type="date" name="date_from" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                value="{{ old('date_from') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="date_to" class="block text-gray-700">Date To</label>
                            <input type="date" name="date_to" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                value="{{ old('date_to') }}">
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">Save</button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
