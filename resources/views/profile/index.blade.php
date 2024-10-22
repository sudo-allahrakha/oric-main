<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Researcher Profiles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Profiles list</h2>

                    @if ($profiles->isEmpty())
                        <p class="text-gray-500">No profiles found.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-200 text-gray-600">
                                    <tr>
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Email</th>
                                        <th class="py-3 px-6 text-left">Academic Title</th>
                                        <th class="py-3 px-6 text-left">Subject</th>
                                        <th class="py-3 px-6 text-left">Specialization</th>
                                        <th class="py-3 px-6 text-left">Research Area</th>
                                        <th class="py-3 px-6 text-left">Contact</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($profiles as $profile)
                                        <tr class="border-b">
                                            <td class="py-3 px-6 text-indigo-500 font-bold"> <a
                                                    href="/profiles/detail/{{ $profile->user->id }}">{{ $profile->user->name }}</a>
                                            </td>
                                            <td class="py-3 px-6">{{ $profile->user->email }}</td>
                                            <td class="py-3 px-6">{{ $profile->academic_title }}</td>
                                            <td class="py-3 px-6">{{ $profile->subject }}</td>
                                            <td class="py-3 px-6">{{ $profile->specialization }}</td>
                                            <td class="py-3 px-6">{{ $profile->research_area }}</td>
                                            <td class="py-3 px-6">{{ $profile->contact }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>