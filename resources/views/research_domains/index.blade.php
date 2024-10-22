<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Research Domains') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('research-domains.create') }}" class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add New Domain</a>

                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Research Area</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Keywords</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Targeted SDGs</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchDomains as $domain)
                                <tr>
                                    <td class="px-6 py-4">{{ $domain->research_area }}</td>

                                    {{-- Display keywords as chips --}}
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($domain->keywords as $keyword)
                                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full inline-flex items-center">
                                                    {{ $keyword }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>

                                    {{-- Display targeted SDGs as chips --}}
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($domain->targeted_sdg as $sdg)
                                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full inline-flex items-center">
                                                    {{ $sdg }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>

                                    {{-- Actions: Edit and Delete --}}
                                    <td class="px-6 py-4">
                                        <a href="{{ route('research-domains.edit', $domain->id) }}" class="text-indigo-500 mr-2">Edit</a>
                                        <form action="{{ route('research-domains.destroy', $domain->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
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
