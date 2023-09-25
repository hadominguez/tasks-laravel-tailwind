@extends('layout')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('task') }}" method="POST">
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
                    <input id="title" name="title" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="priority_id" class="block text-sm font-medium leading-6 text-gray-900">Select Priority:</label>
                <select id="priority_id" name="priority_id" class="block w-full bg-white border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea id="description" name="description" rows="3" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>


<div class="bg-white py-24 sm:py-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Things to do</h2>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($tasks as $task)
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="relative flex items-center gap-x-4">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            User:
                            @foreach ($users as $user)
                            @if ($user->id == $task->user_id)
                            {{ $user->name }}
                            @endif
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="{{ $task->created_at }}" class="text-gray-500">
                        {{ $task->created_at }}
                    </time>
                    <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                        @foreach ($priorities as $priority)
                        @if ($priority->id == $task->priority_id)
                        <time datetime="{{ $priority->name }}" class="text-gray-500">
                            {{ $priority->name }}
                        </time>
                        @endif
                        @endforeach</a>
                </div>
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="{{ route('task-show', ['id' => $task->id]) }}">
                            Title: {{ $task->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                        {{ $task->description }}
                    </p>
                </div>
                <form class="space-y-6" action="{{ route('task-delete', [$task->id]) }}" method="POST">
                    @csrf

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
                    </div>
                </form>
            </article>
            @endforeach
        </div>
    </div>
</div>

@endsection