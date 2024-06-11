<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Class') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6">Edit Class</h1>
            <form action="{{ route('classes.update', $class->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="class_id" class="block text-sm font-medium text-gray-700">Class ID</label>
                    <input type="text" name="class_id" id="class_id" value="{{ $class->id }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" readonly>
                </div>
                <div class="mb-4">
                    <label for="teacher_id" class="block text-sm font-medium text-gray-700">Teacher ID</label>
                    <input type="text" name="teacher_id" id="teacher_id" value="{{ $class->teacher_id }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="class_name" class="block text-sm font-medium text-gray-700">Class Name</label>
                    <input type="text" name="class_name" id="class_name" value="{{ $class->class_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="teacher_name" class="block text-sm font-medium text-gray-700">Teacher Name</label>
                    <input type="text" name="teacher_name" id="teacher_name" value="{{ $class->teacher_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
