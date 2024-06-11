<!-- resources/views/parent/activities-joined.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activities Joined
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6">Activities Joined</h1>
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
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
                                @foreach($joinedActivities as $joined)
                                <tr>
                                    <td class="border px-4 py-2">{{ $joined->activity->activity_id }}</td>
                                    <td class="border px-4 py-2">{{ $joined->activity->activity_name }}</td>
                                    <td class="border px-4 py-2">{{ $joined->activity->activity_description }}</td>
                                    <td class="border px-4 py-2">{{ $joined->activity->class_name }}</td>
                                    <td class="border px-4 py-2">{{ $joined->activity->activity_date }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <form action="{{ route('parent.delete-joined-activity', $joined->activity->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">
                                                Delete
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
