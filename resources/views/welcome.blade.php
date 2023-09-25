@extends('layout')

@section('content')
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
                        <a href="#">
                            Title: {{ $task->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                        {{ $task->description }}
                    </p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endsection