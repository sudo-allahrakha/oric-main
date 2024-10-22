<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Education Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <label class="block text-gray-700 font-bold">Degree:</label>
                        <p class="mt-1">{{ $education->degree }}</p>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 font-bold">University:</label>
                        <p class="mt-1">{{ $education->university }}</p>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 font-bold">Year:</label>
                        <p class="mt-1">{{ $education->year }}</p>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 font-bold">Discipline:</label>
                        <p class="mt-1">{{ $education->discipline }}</p>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('education.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
