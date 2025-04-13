@extends('_layouts.master')

@section('hero')
<div class="[background-image:url('/assets/images/jigsaw-outline.svg')] flex flex-col items-center justify-center w-full min-h-[175px] mb-12 text-white bg-cover">
    <h1 class="mb-4 text-4xl font-extralight text-center">
        The ultimate showcase <br>of web sites built with Jigsaw.
    </h1>

    <p class="font-extralight">
        Browse <a href="#websites" class="font-normal text-white">website inspiration</a>, find <a href="#articles" class="font-normal text-white">articles</a>, or <a href="/get-featured" class="font-normal text-white">get featured</a>.
    </p>
</div>
@endsection

@section('body')
<div class="space-y-12">
    <section x-data="{ all: false }" id="articles">
        <h2 class="mb-4 text-2xl text-gray-800">Recent Articles</h2>

        <div class="grid grid-cols-[repeat(auto-fill,minmax(18rem,1fr))] gap-6">
            @foreach ($articles as $article)
                <div x-cloak x-show="{{ $loop->index <= 2 ? 'true' : 'all' }}" class="relative flex flex-col justify-items-start h-48 p-4 bg-white border shadow-sm hover:shadow-lg rounded-sm transition">
                    <span class="text-sm text-gray-600">{{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
                    <a href="{{ $article->url }}" class="mt-3 text-lg text-sky-600">
                        {{ $article->title }}
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                    <span class="mt-auto text-sm text-gray-600">by {{ $article->author }}</span>
                </div>
            @endforeach
        </div>

        <button
            x-show="!all"
            x-on:click="all = true"
            class="block px-6 py-3 mx-auto my-6 text-purple-600 bg-white border shadow-sm rounded-sm focus-visible:outline-hidden focus-visible:ring-2 transition"
            type="button"
        >
            View all articles
        </button>
    </section>

    <section x-data="{ type: 'all' }" id="websites" class="space-y-8">
        <div class="text-sm text-center">
            <button
                x-on:click="type = 'all'"
                x-bind:class="{ 'text-purple-800! underline': type === 'all' }"
                class="p-2 md:p-4 lg:mx-4 text-gray-800 hover:text-purple-800 hover:underline transition"
                type="button"
            >
                All Categories
            </button>
            @foreach ($page->typeColors as $type => $color)
                <button
                    x-on:click="type = @js($type)"
                    x-bind:class="{ 'text-purple-800! underline': type === @js($type) }"
                    class="p-2 md:p-4 lg:mx-4 text-gray-800 hover:text-purple-800 hover:underline transition"
                    type="button"
                >
                    {{ \Illuminate\Support\Str::title($type) }}
                </button>
            @endforeach
        </div>
        <div class="grid grid-cols-[repeat(auto-fill,minmax(18rem,1fr))] gap-6">
            @foreach ($sites as $site)
                @include('_partials.site')
            @endforeach
        </div>
    </section>
</div>
@endsection
