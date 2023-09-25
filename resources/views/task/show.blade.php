@extends('layout')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('task-update', ['id' => $task->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
            @endif
            @if ($errors->has('title') || $errors->has('description'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Alert!</p>
                @if ($errors->has('title'))
                <p>{{ $errors->first('title') }}</p>
                @endif
                @if ($errors->has('description'))
                <p>{{ $errors->first('description') }}</p>
                @endif
            </div>
            @endif
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Task Title</label>
                <div class="mt-2">
                    <input id="title" value="{{ $task->title }}" name="title" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="priority_id" class="block text-sm font-medium leading-6 text-gray-900">Select Priority:</label>
                <select id="priority_id" name="priority_id" class="block w-full bg-white border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}"
                    @if ($priority->id == $task->priority_id)
                    selected='true'
                    @endif
                    >{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea id="description" name="description" rows="3" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $task->description }}</textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection