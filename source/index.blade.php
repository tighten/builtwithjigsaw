@extends('_layouts.master')

@section('body')
<div class="mb-8 text-center text-grey-darkest">
    <h2 class="font-thin mb-4 mt-20">The ultimate showcase of web sites built with <a href="http://jigsaw.tighten.co/" class="text-grey-darkest underline hover:text-purple-dark">Jigsaw</a></h2>

    <p>Browse <a href="#websites">website inspiration</a>, find <a href="#articles">articles</a>, or <a href="/get-featured">get featured</a>.</p>
</div>

<div id="websites" v-cloak>
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

    <div id="articles" class="mt-8 pt-8">
        <h2 class="font-normal text-grey-darkest mb-4">Recent Articles</h2>

        <div class="flex flex-wrap -mx-2">
            @foreach ($articles as $article)
            <div class="{{ $loop->index > 2 ? 'hidden' : 'flex' }} article h-48 flex-col justify-between bg-white border shadow md:mx-2 my-4 p-4" style="width: 380px;">
                <span class="text-grey-dark">{{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
                <a href="{{ $article->url }}" class="text-lg text-blue">{{ $article->title }}</a><br>
                <span class="text-grey-dark">by {{ $article->author }}</span>
            </div>
            @endforeach
        </div>

        <button
            class="block bg-white rounded border text-purple focus:outline-none shadow mx-auto my-4 px-6 py-4"
            @click="displayAllArticles"
        >View all articles</button>
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
                let articles = document.getElementsByClassName('hidden article');

                for (let article of articles) {
                    article.classList.replace('hidden', 'flex');
                }
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
