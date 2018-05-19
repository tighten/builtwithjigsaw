@extends('_layouts.master')

@section('body')
<h1 class="mb-6">Built with Jigsaw</h1>
@foreach ($sites->sortByDesc('added')->groupBy('added') as $date => $sites)
    <h3 class="mt-4 mb-2">Added {{ Datetime::createFromFormat('U', $date)->format('M d, Y') }}:</h3>
    <ul>
        @foreach ($sites as $site)
        <li class="mb-2">
            <a href="{{ $site->url }}">{{ $site->title }}</a> (by {{ implode($site->authors, ', ') }})
            @if ($site->repo)
            <small> ---- OPEN SOURCE: <a href="{{ $site->repo }}">{{ $site->repo }}</a></small>
            @endif
        </li>
        @endforeach
    </ul>
@endforeach
@endsection
