@extends('_layouts.master')

@section('body')
<div class="text-center mb-8 text-grey-darkest">
    <img src="/assets/images/header-background.png" alt="Puzzle pieces flying around" class="opacity-10" style="opacity: 0.1">

    <h2 class="mb-4 font-thin">The ultimate showcase of web sites built with Jigsaw</h2>
    <p>Browse <a href="#websites">web site inspiration</a>, find <a href="#articles">articles</a>, or <a href="/get-featured">get featured</a>.</p>
</div>

<div class="mt-8 pt-8 flex justify-center flex-wrap" id="websites">
    @foreach ($sites as $site)
        @include ('_partials.site', [
            'site' => $site,
            'page' => $page
        ])
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
