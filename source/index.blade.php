@extends('_layouts.master')

@section('hero')
<div class="[background-image:url('/assets/images/jigsaw-outline.svg')] flex flex-col items-center justify-center w-full min-h-[175px] mb-8 text-white bg-cover">
    <h1 class="mb-4 text-4xl font-extralight text-center">
        The ultimate showcase <br>of web sites built with Jigsaw.
    </h1>

    <p class="font-extralight">
        Browse <a href="#websites" class="font-normal text-white">website inspiration</a>, find <a href="#articles" class="font-normal text-white">articles</a>, or <a href="/get-featured" class="font-normal text-white">get featured</a>.
    </p>
</div>
@endsection

@section('body')
<div id="main" v-cloak>
    <div id="articles" class="pt-8 mt-8">
        <h2 class="mb-4 ml-2 text-2xl text-gray-800">Recent Articles</h2>

        <div class="flex flex-wrap justify-center -mx-2 lg:justify-start">
            @foreach ($articles as $article)
                <a href="{{ $article->url }}" class="article relative {{ $loop->index > 2 ? 'hidden' : 'flex' }} flex-col justify-start w-[380px] h-48 p-4 my-4 md:mx-2 bg-white border hover:no-underline shadow hover:shadow-lg">
                    <span class="mb-3 text-sm text-gray-600">{{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
                    <span class="text-lg text-sky-600">{{ $article->title }}</span>
                    <span class="absolute text-sm text-gray-600 bottom-[20px]">by {{ $article->author }}</span>
                </a>
            @endforeach
        </div>

        <button
            class="block px-6 py-3 mx-auto my-4 text-purple-600 bg-white border rounded shadow focus:outline-none"
            @click="displayAllArticles"
            id="articleDisplayButton"
        >
            View all articles
        </button>
    </div>

    <div id="websites">
        <div class="pt-8 mt-8 text-sm text-center">
            <button
                :class="['inline-block pb-2 px-2 md:px-4 lg:px-8 lg:mx-4 text-gray-800 hover:text-purple-800 hover:underline', { '!text-purple-800 underline': type === 'all' }]"
                @click="filterType('all')"
            >
                All Categories
            </button>
            <button
                v-for="color, thisType in colors"
                @click="filterType(thisType)"
                :class="['inline-block pb-2 px-2 md:px-4 lg:px-8 lg:mx-4 text-gray-800 hover:text-purple-800 hover:underline', { '!text-purple-800 underline': type === thisType }]"
            >
                {| _.startCase(thisType) |}
            </button>
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
