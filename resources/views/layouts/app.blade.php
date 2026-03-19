<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9142FW6YY3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-9142FW6YY3');
    </script>
    @unless (app()->environment('production'))
        <meta name="robots" content="noindex, nofollow">
    @endunless
    <title>@yield('title', '薬局はくば') - 薬局はくば</title>
    <meta name="description"
        content="未来都市を体現するスマートシティ「柏の葉」。この地で、地域の皆さまから選ばれる薬局であるために——。私たちは「安心・信頼・笑顔」を大切に、日々、地域医療に貢献しています。" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ページ固有のスタイル --}}
    @yield('styles')

</head>

<body class="font-sans antialiased text-gray-800">
    <div class="min-h-screen bg-white">
        @include('components.header')

        <main class="pt-12">
            @yield('content')
        </main>

        @include('components.footer')
    </div>
</body>

</html>