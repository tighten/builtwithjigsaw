@extends('_layouts.master')

@section('body')
<div class="text-center mb-8 text-grey-darkest">
    <img src="/assets/images/header-background.png" alt="Puzzle pieces flying around" class="max-w-full lg:max-w-xl" style="opacity: 0.1">

    <h2 class="mb-4 font-thin">The ultimate showcase of web sites built with <a href="http://jigsaw.tighten.co/" class="text-grey-darkest hover:text-purple">Jigsaw</a></h2>
    <p>Browse <a href="#websites" class="text-purple hover:text-purple-darker no-underline hover:underline">website inspiration</a>, find <a href="#articles" class="text-purple hover:text-purple-darker no-underline hover:underline">articles</a>, or <a href="/get-featured" class="text-purple hover:text-purple-darker no-underline hover:underline">get featured</a>.</p>
</div>

<div class="mt-8 pt-8 flex justify-center flex-wrap" id="websites">
    <div v-for="site in sites">
        @include ('_partials.site')
    </div>
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

<script>
new Vue({
    delimiters: ['{|', '|}'],
    data: {
        sites: @json($sites->values()->map(function ($site) {
                $site['image'] = $site->image();
                return $site;
            })
        ),
        colors: @json($page->typeColors),
    },
}).$mount('#websites');
</script>

@endsection
