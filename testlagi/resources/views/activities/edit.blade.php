<!-- resources/views/activities/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Activity
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('activities.update', $activity->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="activity_id" class="block font-medium text-sm text-gray-700">Activity ID</label>
                            <input id="activity_id" class="block mt-1 w-full" type="text" name="activity_id" value="{{ old('activity_id', $activity->activity_id) }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <label for="activity_name" class="block font-medium text-sm text-gray-700">Activity Name</label>
                            <input id="activity_name" class="block mt-1 w-full" type="text" name="activity_name" value="{{ old('activity_name', $activity->activity_name) }}" required />
                        </div>
                        <div class="mt-4">
                            <label for="activity_description" class="block font-medium text-sm text-gray-700">Activity Description</label>
                            <textarea id="activity_description" class="block mt-1 w-full" name="activity_description" required>{{ old('activity_description', $activity->activity_description) }}</textarea>
                        </div>
                        <div class="mt-4">
                            <label for="class_id" class="block font-medium text-sm text-gray-700">Class</label>
                            <select id="class_id" class="block mt-1 w-full" name="class_id" required>
                                <option value="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ $activity->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="subject_id" class="block font-medium text-sm text-gray-700">Quota</label>
                            <input id="subject_id" class="block mt-1 w-full" type="text" name="subject_id" value="{{ old('subject_id', $activity->subject_id) }}" required />
                        </div>
                        <div class="mt-4">
                            <label for="activity_date" class="block font-medium text-sm text-gray-700">Activity Date</label>
                            <input id="activity_date" class="block mt-1 w-full" type="date" name="activity_date" value="{{ old('activity_date', $activity->activity_date) }}" required />
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ route('activities.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-gray-600 disabled:opacity-25 transition">
                                Back
                            </a>
                            <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                                Update Activity
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
