@extends('_layouts.master')

@section('body')
<h1 class="mb-6">Built with Jigsaw</h1>
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
@endsection
