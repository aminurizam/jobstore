@extends('welcome')

@section('main')
    <div class="flex justify-between">
        <h1 class="font-mono text-3xl font-bold">TODO</h1>
        <a href="{{ route('tasks.reset') }}"
            class="flex justify-center px-4 py-2 mb-4 bg-blue-400 rounded-sm hover:bg-blue-600">Reset</a>
    </div>
    <div class="grid grid-cols-2 gap-10">
        <form action="{{ route('task.save') }}" method="POST">
            @csrf
            <h3 class="font-mono text-xl font-semibold">Add todo</h3>
            <div class="mb-4">
                <label for="title" class="block mb-2 font-medium text-gray-900">Title</label>
                <input type="text" id="title" name="title" class="w-full px-2 py-1 border rounded-sm bg-gray-50">
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 font-medium text-gray-900">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    class="w-full px-2 py-1 border rounded-sm bg-gray-50"></textarea>
            </div>

            <button class="flex justify-center w-full px-4 py-1 bg-green-400 rounded-sm hover:bg-green-600">Submit</button>
        </form>

        <table id="dataTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created At</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody id="tableBody">
                @if (session()->has('tasks'))
                    @foreach (session()->get('tasks') as $task)
                        <tr>
                            <td class="pr-4">{{ $task->title }}</td>
                            <td class="pr-4">{{ $task->created_at }}</td>
                            {{-- <td>
                                <button class="px-4 py-1 bg-green-300 rounded-sm hover:bg-green-500">Edit</button>
                                <form action="{{ route('task.delete', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-1 bg-red-300 rounded-sm hover:bg-red-500" type="submit">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
