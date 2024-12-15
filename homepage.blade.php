@extends('layouts.app')
@section('title')
    Home
@endsection

@section('content')
    <!-- Text Header -->
    <header class="container w-full mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="text-3xl font-bold uppercase text-primary-700 hover:text-gray-700 sm:text-5xl" href="#">
                Curiosity Corner
            </a>
            <p class="text-lg text-gray-600">
                Fueling the Fire of Inquisitive Minds
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 bg-gray-100 border-t border-b" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
                class="flex items-center justify-center block text-base font-bold text-center uppercase md:hidden"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="ml-2 fas"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="flex-grow w-full sm:flex sm:items-center sm:w-auto">
            <div class="container flex flex-col items-center justify-center w-full px-6 py-2 mx-auto mt-0 text-sm font-bold uppercase sm:flex-row">
                <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Technology</a>
                <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Automotive</a>
                <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Finance</a>
                <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Politics</a>
                <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Culture</a>
                <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Sports</a>
            </div>
        </div>
    </nav>
    
    <div class="flex justify-end w-11/12 mb-5 md:max-w-[760px] mx-auto lg:max-w-[1000px]">
        {{-- <a href="{{ route('blog.create') }}" class="p-2 text-white rounded-md bg-primary-700 hover:outline-primary-700 hover:text-primary-700 hover:bg-white hover:outline hover:outline-1">Create Blog Post</a> --}}
        <x-main-button href="{{ route('blog.create') }}">
            Create Blog Post
        </x-main-button>
    </div>
    <div class="block w-11/12 mx-auto md:flex-wrap md:flex md:max-w-[760px] gap-3 mb-8 lg:max-w-[1000px]">
        @foreach ($blogs as $blog)
            <a href="{{ route('blog.show', $blog) }}" class="w-3/3 md:w-[32%] mb-3 md:mb-0 block">
                <div class="md:h-[350px] border rounded-md hover:border-primary-400 overflow-hidden h-[350px]">
                    <div class="overflow-hidden h-[200px]">
                        <img src="{{ asset('storage').'/'.$blog->image }}" alt="blog image" class="object-contain w-full">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold">{{ $blog->title }}</h3>
                        <p>{{ Str::limit($blog->content, 60) }}</p>
                    </div>
                </div>
            </a>

        @endforeach

    </div>
    <div class="w-11/12 md:max-w-[760px] lg:max-w-[1000px] mb-10 mx-auto">
        {{ $blogs->links() }}
    </div>
@endsection

