<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/main.css">
        <title>Built With Jigsaw</title>

        <meta property="og:title" content="Built With Jigsaw">
        <meta property="og:description" content="A collection of sites, apps, & articles about/around the Jigsaw static site generator">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ $page->baseUrl }}assets/images/builtwithjigsaw-og.jpg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{{ $page->baseUrl }}">
        <meta property="og:site_name" content="Built With Jigsaw">

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="pt-8">
        <div class="container mx-auto mt-8 pt-8">
            <div class="text-center mb-8 pb-6 uppercase tracking-wide border-b">
                <h1>Built <span class="lowercase italic text-grey-darkest">with</span> Jigsaw</h1>
            </div>

            <div class="mb-8 md:w-1/2 mx-auto leading-normal px-4">
                Want to add an article you wrote or found about Jigsaw? Or add your site or project to our list? Add a <a href="https://github.com/tightenco/builtwithjigsaw/compare">Pull Request</a> if you feel comfortable, but if not, just add an <a href="https://github.com/tightenco/builtwithjigsaw/issues/new">Issue</a> and we'll add the code for you.
            </div>

            <div class="px-4 pt-8 border-t">
                @yield('body')
            </div>

            <div class=" px-4 my-8 pt-8 border-t border-grey-light text-center">
                <a href="http://jigsaw.tighten.co/">Jigsaw</a> is a static site generator brought to you by <a href="https://tighten.co/">Tighten</a>. This site is <a href="https://github.com/tightenco/builtwithjigsaw">open source on GitHub</a>.
            </div>
        </div>

        @if ($page->production)
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-53203205-6"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-53203205-6');
            </script>
        @endif
    </body>
</html>
