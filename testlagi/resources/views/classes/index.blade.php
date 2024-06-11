<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Admin Dashboard</a>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6">Manage Classes</h1>
            <a href="{{ route('classes.create') }}" class="inline-flex items-center px-4 py-2 mb-6 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">Create Class</a>
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/4 px-4 py-2">Class ID</th>
                            <th class="w-1/4 px-4 py-2">Teacher ID</th>
                            <th class="w-1/4 px-4 py-2">Class Name</th>
                            <th class="w-1/4 px-4 py-2">Teacher Name</th>
                            <th class="px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($classes as $class)
                        <tr>
                            <td class="border px-4 py-2">{{ $class->id }}</td>
                            <td class="border px-4 py-2">{{ $class->teacher_id }}</td>
                            <td class="border px-4 py-2">{{ $class->class_name }}</td>
                            <td class="border px-4 py-2">{{ $class->teacher_name }}</td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('classes.edit', $class) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 focus:outline-none focus:border-yellow-600 focus:ring focus:ring-yellow-200 active:bg-yellow-500 disabled:opacity-25 transition">Edit</a>
                                    <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
