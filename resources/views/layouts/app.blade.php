<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '薬局はくば') - 薬局はくば</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* HPテキスト管理のリッチテキストエディタ用スタイル */
        .rich-text-content font[size="1"] {
            font-size: 10px;
        }

        .rich-text-content font[size="2"] {
            font-size: 13px;
        }

        .rich-text-content font[size="3"] {
            font-size: 16px;
        }

        .rich-text-content font[size="4"] {
            font-size: 18px;
        }

        .rich-text-content font[size="5"] {
            font-size: 24px;
        }

        .rich-text-content font[size="6"] {
            font-size: 32px;
        }

        .rich-text-content font[size="7"] {
            font-size: 48px;
        }

        .rich-text-content img {
            max-width: 80%;
            height: auto;
            display: block;
            margin: 1em 0;
        }

        .rich-text-content {
            line-height: 1.6;
        }

        .rich-text-content b,
        .rich-text-content strong {
            font-weight: bold;
        }

        .rich-text-content i,
        .rich-text-content em {
            font-style: italic;
        }

        .rich-text-content u {
            text-decoration: underline;
        }

        .rich-text-content h1,
        .rich-text-content h2,
        .rich-text-content h3,
        .rich-text-content h4,
        .rich-text-content h5,
        .rich-text-content h6 {
            margin: 0.5em 0;
            font-weight: bold;
        }

        .rich-text-content p {
            margin: 0.5em 0;
        }

        .rich-text-content ul,
        .rich-text-content ol {
            margin: 0.5em 0;
            padding-left: 2em;
        }

        .rich-text-content blockquote {
            margin: 1em 0;
            padding-left: 1em;
            border-left: 3px solid #ccc;
        }

        /* フォントの太さスタイル */
        .rich-text-content span[style*="font-weight"] {
            font-weight: inherit;
        }

        .rich-text-content span[style*="font-weight: 100"] {
            font-weight: 100 !important;
        }

        .rich-text-content span[style*="font-weight: 200"] {
            font-weight: 200 !important;
        }

        .rich-text-content span[style*="font-weight: 300"] {
            font-weight: 300 !important;
        }

        .rich-text-content span[style*="font-weight: 400"],
        .rich-text-content span[style*="font-weight: normal"] {
            font-weight: 400 !important;
        }

        .rich-text-content span[style*="font-weight: 500"] {
            font-weight: 500 !important;
        }

        .rich-text-content span[style*="font-weight: 600"] {
            font-weight: 600 !important;
        }

        .rich-text-content span[style*="font-weight: 700"],
        .rich-text-content span[style*="font-weight: bold"] {
            font-weight: 700 !important;
        }

        .rich-text-content span[style*="font-weight: 800"] {
            font-weight: 800 !important;
        }

        .rich-text-content span[style*="font-weight: 900"],
        .rich-text-content span[style*="font-weight: bolder"] {
            font-weight: 900 !important;
        }

        .rich-text-content span[style*="font-weight: lighter"] {
            font-weight: 200 !important;
        }

        /* フォントファミリースタイル */
        .rich-text-content span[style*="font-family"] {
            font-family: inherit;
        }

        /* 明るい文字色用の背景スタイル */
        .rich-text-content span[style*="background-color: #f5f5dc"],
        .rich-text-content span[style*="background-color: rgb(245, 245, 220)"] {
            background-color: #f5f5dc !important;
            padding: 2px 4px !important;
            border-radius: 3px !important;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800">
    <div class="min-h-screen bg-white">
        @include('components.header')

        <main class="pt-20">
            @yield('content')
        </main>

        @include('components.footer')
    </div>
</body>

</html>