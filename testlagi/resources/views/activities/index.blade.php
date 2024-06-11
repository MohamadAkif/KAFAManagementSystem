<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-6">Activities</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 px-4 py-2">Activity ID</th>
                                    <th class="w-1/6 px-4 py-2">Class Name</th>
                                    <th class="w-1/6 px-4 py-2">Activity Name</th>
                                    <th class="w-1/3 px-4 py-2">Activity Description</th>
                                    <th class="w-1/6 px-4 py-2">Activity Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($activities as $activity)
                                <tr>
                                    <td class="border px-4 py-2">{{ $activity->activity_id }}</td>
                                    <td class="border px-4 py-2">{{ $activity->class_name }}</td>
                                    <td class="border px-4 py-2">{{ $activity->activity_name }}</td>
                                    <td class="border px-4 py-2">{{ $activity->activity_description }}</td>
                                    <td class="border px-4 py-2">{{ $activity->activity_date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>