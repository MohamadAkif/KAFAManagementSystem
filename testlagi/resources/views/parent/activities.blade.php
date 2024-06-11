<!-- resources/views/parent/activities.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Available Activities
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex justify-between">
                        <form method="GET" action="{{ route('parent.activities') }}" class="flex w-full">
                            <input type="text" name="search" placeholder="Search by Activity ID or Name" class="border rounded p-2 w-full" value="{{ request('search') }}">
                            <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                                Search
                            </button>
                        </form>
                    </div>
                    <h1 class="text-2xl font-semibold mb-6">Available Activities</h1>
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 px-4 py-2">Activity ID</th>
                                    <th class="w-1/6 px-4 py-2">Activity Name</th>
                                    <th class="w-1/6 px-4 py-2">Description</th>
                                    <th class="w-1/6 px-4 py-2">Class</th>
                                    <th class="w-1/6 px-4 py-2">Date</th>
                                    <th class="px-4 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($activities as $activity)
                                <tr>
                                    <td class="border px-4 py-2">{{ $activity->activity_id }}</td>
                                    <td class="border px-4 py-2">{{ $activity->activity_name }}</td>
                                    <td class="border px-4 py-2">{{ $activity->activity_description }}</td>
                                    <td class="border px-4 py-2">{{ $activity->class_name }}</td>
                                    <td class="border px-4 py-2">{{ $activity->activity_date }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <form action="{{ route('parent.join-activity', $activity->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                                                Join Activity
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('parent.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
