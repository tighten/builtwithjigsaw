@extends('_layouts.master')

@section('body')
<div class="text-center mb-8 text-grey-darkest">
    <img src="/assets/images/header-background.png" alt="Puzzle pieces flying around" class="opacity-10" style="opacity: 0.1">

    <h2 class="mb-4 font-thin">The ultimate showcase of web sites built with Jigsaw</h2>
    <p>Browse <a href="#websites">web site inspiration</a>, find <a href="#websites">articles</a>, or <a href="/get-featured">get featured</a>.</p>
</div>

<div class="mt-8 pt-8 flex justify-center flex-wrap" id="websites">
    @foreach ($sites->sortByDesc('added') as $site)
    <div class="flex m-2 shadow" style="width: 380px;">
        <div class="flex-1">
            <img src="http://via.placeholder.com/380x210">
            <div class="middle-thingy text-sm py-4 px-6 bg-white">
                <div class="font-bold">{{ $site->title }}</div>
                <div class="mb-4">by {{ implode($site->authors, ', ') }}</div>
                {{--@todo make it a foreach:--}}
                <div class="mb-4">
                    <span class="bg-green text-xs text-white p-2 font-bold rounded">{{ ucwords($site->type) }}</span>
                </div>
            </div>
            <div class="bottom-thingy bg-white flex text-sm font-bold border-t">
                <a href="{{ $site->url }}" class="p-4 flex-1 text-center display-block p-4 no-underline text-blue hover:bg-blue hover:text-white">{{--[icon]--}} Visit website</a>
                @if ($site->repo)
                <a href="{{ $site->repo }}" class="p-4 flex-1 text-center display-block p-4 no-underline text-blue hover:bg-blue hover:text-white">{{--[icon]--}} Visit repo</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<div id="articles" class="mt-8 pt-8">
    <h2 class="mb-4">Recent Articles</h2>

    <ul>
    @foreach ($articles as $article)
        <li class="mb-4">
            <a href="{{ $article->url }}">{{ $article->title }}</a><br>
            <span class="text-grey-darker">by {{ $article->author }} on {{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
        </li>
    @endforeach
    </ul>
</div>
@endsection
