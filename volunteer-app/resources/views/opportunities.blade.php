<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mt-1 mb-4">
                        <div class="relative max-w-xs">
                            <form action="{{ route('opportunities.search') }}" method="GET">
                                <label for="search" class="sr-only">
                                    Search
                                </label>
                                <input type="text" name="s"
                                    class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Search..." />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Location
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tags
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Schedule
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Skills
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Requirements
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No. of volunteers needed
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No. of volunteers assigned
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($opportunities as $opportunity)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{$opportunity->title}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->date}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->location}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->tags}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->schedule}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->skills}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->requirements}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->no_of_volunteers_needed}}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{$opportunity->no_of_volunteers_assigned}}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $opportunities->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
