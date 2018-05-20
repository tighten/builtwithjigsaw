@extends('_layouts.master')

@section('body')
<div class="md:flex">
    <div class="flex-1">
        <h1 class="mb-4">Built with Jigsaw</h1>

        @foreach ($sites->sortByDesc('added')->groupBy('added') as $date => $sites)
            <h3 class="mt-6 mb-2">Added {{ Datetime::createFromFormat('U', $date)->format('M d, Y') }}:</h3>
            <ul>
                @foreach ($sites->sortBy('title') as $site)
                <li class="mb-4">
                    <a href="{{ $site->url }}" class="font-bold">{{ $site->title }}</a> (by {{ implode($site->authors, ', ') }}) <span class="bg-green text-xs text-white p-1 rounded">{{ $site->type }}</span><br>
                    @if ($site->repo)
                    <span class="text-xs text-grey-darker">REPO: <a href="{{ $site->repo }}" class="text-grey-dark">{{ $site->repo }}</a></span>
                    @endif
                </li>
                @endforeach
            </ul>
        @endforeach
    </div>
    <div class="flex-1">
        <h1 class="mb-4">Articles about Jigsaw</h1>

        <ul>
        @foreach ($articles as $article)
            <li class="mb-4">
                <a href="{{ $article->url }}">{{ $article->title }}</a><br>
                <span class="text-grey-darker">by {{ $article->author }} on {{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@endsection
