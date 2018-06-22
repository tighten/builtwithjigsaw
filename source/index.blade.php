@extends('_layouts.master')

@section('body')
<div class="mb-8 text-center text-grey-darkest">
    <img src="/assets/images/header-background.png" alt="Puzzle pieces flying around" class="max-w-full lg:max-w-xl opacity-10">

    <h2 class="font-thin mb-4">The ultimate showcase of web sites built with <a href="http://jigsaw.tighten.co/" class="text-grey-darkest underline hover:text-purple">Jigsaw</a></h2>

    <p>Browse <a href="#websites">website inspiration</a>, find <a href="#articles">articles</a>, or <a href="/get-featured">get featured</a>.</p>
</div>

<div id="websites" v-cloak>
    <div class="text-center mt-8 pt-8 text-sm">
        <a
            @click="filterType('all')"
            :class="{'cursor-pointer inline-block pb-2 px-2 md:px-4 lg:px-8 lg:mx-4 text-grey-darkest': true, 'text-purple underline': type == 'all'}"
            >All Categories</a>
        <a
            v-for="color, thisType in colors"
            @click="filterType(thisType)"
            :class="{'cursor-pointer inline-block pb-2 px-2 md:px-4 lg:px-8 lg:mx-4 text-grey-darkest': true, 'text-purple underline': type == thisType}"
            >{| _.startCase(thisType) |}</a>
    </div>
    <div class="mt-1 pt-6 flex flex-wrap justify-center">
        {{--
            If you're coming across this codebase for the first time, you might be
            surprised to see v-for here instead of Blade's @foreach.

            Take a look at resources/views/_partials/site.blade.php to see some
            more notes about how we set this up, and why.
        --}}
        <div v-for="site in filteredSites">
            @include ('_partials.site')
        </div>
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
        // Here we use Laravel Blade's json directive to take our sites,
        // map over them to output the custom image for each, and then
        // JSON-encode them and pass them into Vue.
        sites: @json($sites->values()->map(function ($site) {
                $site['image'] = $site->image();
                return $site;
            })
        ),
        colors: @json($page->typeColors),
        type: 'all',
    },
    methods: {
        filterType: function (type) {
            this.type = type;
        },
    },
    computed: {
        filteredSites() {
            return this.type === 'all' ?
                this.sites :
                this.sites.filter(site => site.types.includes(this.type));
        }
    }
}).$mount('#websites');
</script>

@endsection
