<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="/assets/css/tailwind.min.css">
        <title>Built With Jigsaw</title>

        <meta property="og:title" content="Built With Jigsaw">
        <meta property="og:description" content="A collection of sites, apps, & articles about/around the Jigsaw static site generator">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ $page->baseUrl }}assets/images/builtwithjigsaw-og.jpg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{{ $page->baseUrl }}">
        <meta property="og:site_name" content="Built With Jigsaw">

        <script src="/assets/js/main.js"></script>

        @include ('_partials.svgs')
    </head>
    <body class="bg-grey-lightest text-grey-darker">
        @include ('_partials.header')

        <div class="container mx-auto">
            @yield('body')

            @include ('_partials.footer')
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
