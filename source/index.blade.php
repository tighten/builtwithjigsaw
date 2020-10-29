@extends('_layouts.master')

@section('hero')
<div class="jigsaw-hero">
    <h1 class="mb-4 font-thin text-center">
        The ultimate showcase <br>
        of web sites built with Jigsaw.
    </h1>

    <p class="font-thin">
        Browse <a href="#websites">website inspiration</a>, find <a href="#articles">articles</a>, or <a href="/get-featured">get featured</a>.
    </p>
</div>
@endsection

@section('body')
<div id="main" v-cloak>
    <div id="articles" class="pt-8 mt-8">
        <h2 class="mb-4 ml-2 font-normal text-grey-darkest">Recent Articles</h2>

        <div class="flex flex-wrap justify-center -mx-2 lg:justify-start">
            @foreach ($articles as $article)
                <a href="{{ $article->url }}" class="{{ $loop->index > 2 ? 'hidden' : 'flex' }} article h-48 flex-col bg-white border shadow md:mx-2 my-4 p-4 hover:no-underline hover:shadow-lg justify-start relative">
                    <span class="mb-3 text-sm text-grey-darker">{{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
                    <span class="text-lg text-blue-dark">{{ $article->title }}</span>
                    <span class="absolute text-sm text-grey-darker author">by {{ $article->author }}</span>
                </a>
            @endforeach
        </div>

        <button
                class="block px-6 py-4 mx-auto my-4 bg-white border rounded shadow text-purple focus:outline-none"
                @click="displayAllArticles"
                id="articleDisplayButton"
        >View all articles</button>
    </div>

    <div id="websites">
        <div class="pt-8 mt-8 text-sm text-center">
            <a
                    @click="filterType('all')"
                    :class="{'cursor-pointer inline-block pb-2 px-2 md:px-4 lg:px-8 lg:mx-4 text-grey-darkest': true, 'text-purple-dark underline': type == 'all'}"
            >All Categories</a>
            <a
                    v-for="color, thisType in colors"
                    @click="filterType(thisType)"
                    :class="{'cursor-pointer inline-block pb-2 px-2 md:px-4 lg:px-8 lg:mx-4 text-grey-darkest': true, 'text-purple-dark underline': type == thisType}"
            >{| _.startCase(thisType) |}</a>
        </div>
        <div class="flex flex-wrap justify-center pt-6 mt-1">
            {{--
                If you're coming across this codebase for the first time, you might be
                surprised to see v-for here instead of Blade's @foreach.

                Take a look at resources/views/_partials/site.blade.php to see some
                more notes about how we set this up, and why.
            --}}
            <div v-for="site in filteredSites">
                @include('_partials.site')
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        delimiters: ['{|', '|}'],
        data: {
            // Here we use Laravel Blade's json directive to take our sites,
            // map over them to output the custom image for each, and then
            // JSON-encode them and pass them into Vue.
            sites: @json($sites->values()->map(function($site) {
                $site['image'] = $site->image();
                return $site;
            })),
            colors: @json($page->typeColors),
            type: 'all',
        },
        methods: {
            filterType: function(type) {
                this.type = type;
            },
            displayAllArticles: function(type) {
                let articles = [...document.getElementsByClassName('hidden article')];

                for (let article of articles) {
                    article.classList.replace('hidden', 'flex');
                }
                document.getElementById('articleDisplayButton').classList.add('hidden');
            },
        },
        computed: {
            filteredSites() {
                return this.type === 'all' ?
                    this.sites :
                    this.sites.filter(site => site.types.includes(this.type));
            }
        }
    }).$mount('#main');
</script>

@endsection
