<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trainings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <a href="{{ route('trainings.create') }}"
                        class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add
                        Training</a>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Organizer</th>
                                <th class="py-2 px-4 border-b">Title</th>
                                <th class="py-2 px-4 border-b">Year</th>
                                <th class="py-2 px-4 border-b">Institute</th>
                                <th class="py-2 px-4 border-b">Type</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $training)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $training->organizer }}</td>
                                    <td class="py-2 px-4 border-b">{{ $training->title }}</td>
                                    <td class="py-2 px-4 border-b">{{ $training->year }}</td>
                                    <td class="py-2 px-4 border-b">{{ $training->institute }}</td>
                                    <td class="py-2 px-4 border-b">{{ $training->training_type }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('trainings.edit', $training) }}"
                                            class="text-indigo-500 hover:underline">Edit</a>
                                        <form action="{{ route('trainings.destroy', $training) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:underline ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
