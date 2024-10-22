<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Education') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('education.update', $education->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-gray-700">Degree <span class="text-red-700">*</span></label>
                            <input type="text" name="degree" value="{{ $education->degree }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700">University <span class="text-red-700">*</span></label>
                            <input type="text" name="university" value="{{ $education->university }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700">Year <span class="text-red-700">*</span></label>
                            <input type="number" name="year" value="{{ $education->year }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700">Discipline <span class="text-red-700">*</span></label>
                            <input type="text" name="discipline" value="{{ $education->discipline }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
