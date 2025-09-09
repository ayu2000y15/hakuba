@extends('layouts.app')

@section('title', 'HOME')

@section('content')


    {{-- メインビジュアル --}}
    <div class="relative w-full overflow-hidden">
        <div class="relative w-full overflow-hidden main-visual">
            <img src="{{ asset($imgPc->file_path . $imgPc->file_name) }}" alt="メインビジュアル"
                class="w-full h-auto hidden sm:block">
            <img src="{{ asset($imgMobile->file_path . $imgMobile->file_name) }}" alt="メインビジュアル"
                class="w-full h-auto sm:hidden">
        </div>

        <div
            class="absolute inset-0 flex ml-12 md:ml-48 items-center z-10 pointer-events-none bottom-[50%] md:bottom-[60%]">
            <div class="text-white text-2xl leading-relaxed md:text-3xl xl:text-6xl ">
                {!! nl2br($TopText->content) !!}
            </div>
            <img src="{{ asset($bird->file_path . $bird->file_name) }}" alt="鳥"
                class="ml-0 md:ml-8 mt-30 md:mt-40 xl:mt-70 h-10 xl:h-20" style="object-fit: contain;">
        </div>
        {{-- ★ 変更箇所：柄の画像 --}}
        {{--
        コンテナに直接 clip-path を適用して山形に切り抜きます。
        - clip-path: ellipse(...) で切り抜きの形を定義します。
        - 75% 100% は楕円の幅と高さを、at 50% 100% は楕円の中心を（下端中央に）指定します。
        - この値をお好みで調整することで、山の急さや広がりを変更できます。
        --}}
        <div class="absolute -bottom-20 w-full h-48 md:h-64 lg:h-80 pointer-events-none"
            style="z-index: 10; clip-path: ellipse(90% 100% at 25% 100%);">
            <img src="{{ asset($imgUnder->file_path . $imgUnder->file_name) }}" alt="柄" class="w-full h-full object-cover">
        </div>

        <div class="absolute inset-0 flex items-end justify-center pointer-events-none z-20">
            <div class="mb-[5%] pointer-events-auto">
                <a href="{{ route($button0->spare1) }}">
                    <img src="{{ asset($button0->file_path . $button0->file_name) }}" alt="採用案内"
                        class="h-auto w-[70vw] max-w-xs md:max-w-md lg:max-w-lg transition transform hover:translate-y-1 hover:opacity-80"
                        style="object-fit: contain;">
                </a>
            </div>
        </div>
    </div>

    {{-- 薬局はくばの取り組み --}}
    <div class="-mt-1 md:-mt-4 xl:-mt-5 py-4 md:py-24 bg-cover bg-top bg-no-repeat"
        style="background-image: url('{{ asset($background1->file_path . $background1->file_name) }}'); clip-path: ellipse(250% 100% at 50% 0);">

        {{-- タイトル --}}
        <div class="pt-8 mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleInitiatives->file_path . $titleInitiatives->file_name) }}" alt="タイトル"
                class="lg:h-24 md:h-18 h-8" style="object-fit: contain;">
        </div>

        <div class="container mx-auto px-4 flex flex-col items-center">

            <div class="my-8 mb-4 md:mb-12 w-full max-w-5xl rounded-2xl px-6 md:px-8 md:py-4 relative"
                style="background-color: rgba(255, 255, 255, 0.7);">

                <!-- 車の画像を白い枠の右上角（外側）に配置 -->
                <img src="{{ asset($car->file_path . $car->file_name) }}" alt="車"
                    class="absolute -top-20 -right-0 md:-top-30 md:h-30 h-12 z-10" style="object-fit: contain;">

                @foreach ($initiativeContents as $content)
                    <a href="{{ route('initiatives.detail', $content->id) }}"
                        class="block py-6 border-b-2 border-green-800 last:border-b-0 transition duration-200 ease-in-out hover:opacity-75">

                        {{--
                        ★変更点
                        - flex-col を削除し、常に flex-row（横並び）に。
                        - gap-4 で要素間の隙間を少し狭く。
                        - items-start で要素を上揃えに。
                        --}}
                        <div class="flex flex-row items-start gap-4 max-w-4xl mx-auto">

                            {{--
                            画像コンテナ
                            - w-1/3 で常に左側3分の1の幅を確保。
                            - flex-shrink-0 でテキストが長くても画像が縮まないように固定。
                            --}}
                            <div class="w-1/4 flex-shrink-0">

                                @if (!empty($content->attempt_img["value"]))
                                    @php
                                        $contentImg = $content->attempt_img["value"];
                                    @endphp
                                    <img src="{{ asset($contentImg) }}" alt="コンテンツ画像" class="w-60 h-auto object-contain shadow-lg">
                                @endif
                            </div>

                            {{--
                            テキストコンテナ
                            - text-sm md:text-base で本文の文字サイズを画面幅に応じて変更。
                            --}}
                            <div class="flex-1 text-left text-green-800 text-sm md:text-base">
                                {{--
                                タイトル（h2）
                                - text-lg md:text-3xl でタイトルの文字サイズを画面幅に応じて変更。
                                - mb-1 md:mb-4 でタイトルの下の余白を調整。
                                --}}
                                <h2 class="mb-4 md:mb-8 text-sm md:text-3xl font-bold">{{ $content->attempt["value"] }}</h2>
                                <div class="text-xs md:text-base ">
                                    {!! nl2br($content->home_content["value"]) !!}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mb-12 z-10">
                <a href="{{ route($button1->spare1) }}" class="flex justify-center">
                    <img src="{{ asset($button1->file_path . $button1->file_name) }}" alt="もっとみる"
                        class="md:h-20 h-12 transition transform hover:translate-y-1 hover:opacity-80">
                </a>
            </div>

        </div>
    </div>

    {{-- 店舗案内 --}}
    <div class="bg-cover bg-top bg-no-repeat pt-4 md:pt-24 py-4 -mt-4 md:-mt-6"
        style="background-image: url('{{ asset($background2->file_path . $background2->file_name) }}'); ">
        {{-- タイトル --}}
        <div class="pt-8 mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleStores->file_path . $titleStores->file_name) }}" alt="タイトル" class="lg:h-24 md:h-18 h-8"
                style="object-fit: contain;">
        </div>

        {{-- はくば薬局 --}}
        <a href="{{ route('stores') }}"
            class="block mx-auto my-8 md:my-24 w-full xl:w-[70%] transition duration-300 hover:opacity-70 cursor-pointer">
            <img src="{{ asset($storeImg1->file_path . $storeImg1->file_name) }}" alt="はくば薬局"
                class="w-full transition duration-300 hover:brightness-110" style="object-fit: contain;">
        </a>

        {{-- 柏の葉キャンパス駅前店 --}}
        <a href="{{ route('stores') }}"
            class="block mx-auto my-8 md:my-24 w-full xl:w-[70%] transition duration-300 hover:opacity-70 cursor-pointer">
            <img src="{{ asset($storeImg2->file_path . $storeImg2->file_name) }}" alt="柏の葉キャンパス駅前店"
                class="w-full transition duration-300 hover:brightness-110" style="object-fit: contain;">
        </a>

        {{-- ABOUT US （PC表示）--}}
        <div class="relative hidden lg:block py-12 md:py-24">
            <div class="pt-8 mt-0 flex flex-row items-center gap-8 z-20">
                <img src="{{ asset($titleAbout->file_path . $titleAbout->file_name) }}" alt="タイトル"
                    class="lg:h-24 md:h-18 h-8" style="object-fit: contain;">
                <img src="{{ asset($balloon->file_path . $balloon->file_name) }}" alt="風船" class="ml-24 h-30 z-10"
                    style="object-fit: contain;">
            </div>

            {{-- PC版レイアウト：左右2列構成 --}}
            <div class="container w-[90%] mt-24 mx-auto px-8 flex items-center justify-center gap-16">
                {{-- 左側：説明文エリア --}}
                <div class="flex-1 text-center">
                    <div class="text-2xl xl:text-3xl leading-loose font-semibold" style="color: rgb(128,130,133)">
                        地域のみなさんに選ばれる<br>
                        そんな薬局を目指しています。
                    </div>
                </div>

                {{-- 右側：表示エリア (ボタンではなくdivに変更) --}}
                <div class="flex-1 space-y-6 flex flex-col items-start">
                    {{-- 各項目を表示のみに --}}
                    <div class="text-white text-2xl w-full px-16 py-8 rounded-l-4xl shadow-lg block "
                        style="background-color: rgb(38,167,225)">
                        全店舗駅近
                    </div>
                    <div class="text-white text-2xl w-full px-16 py-8 rounded-l-4xl shadow-lg block "
                        style="background-color: rgb(38,167,225)">
                        若手スタッフが活躍中
                    </div>
                    <div class="text-white text-2xl w-full px-16 py-8 rounded-l-4xl shadow-lg block "
                        style="background-color: rgb(38,167,225)">
                        やりたい！をサポートする制度
                    </div>
                </div>
            </div>

            {{-- もっと見るボタン：中央配置 --}}
            <div class="mt-20 mr-40 z-10 flex items-center justify-center">
                <img src="{{ asset($bird2->file_path . $bird2->file_name) }}" alt="鳥" class="h-30 mr-12 z-10"
                    style="object-fit: contain;">
                <a href="{{ route($button3->spare1) }}">
                    <img src="{{ asset($button3->file_path . $button3->file_name) }}" alt="もっとみる"
                        class="md:h-20 h-12 transition transform hover:scale-105 hover:opacity-90">
                </a>
            </div>
        </div>
    </div>

    {{-- ABOUT US （スマホ表示）--}}
    <div class="relative w-full block lg:hidden">
        <img src="{{ asset($background3->file_path . $background3->file_name) }}" alt="ABOUT US"
            class="w-full h-auto object-cover">
        <div class="absolute inset-0 flex items-end justify-center pointer-events-none">
            <div class="mb-[10%] pointer-events-auto">
                <a href="{{ route($button3->spare1) }}">
                    <img src="{{ asset($button3->file_path . $button3->file_name) }}" alt="もっとみる"
                        class="h-auto w-[40vw] max-w-xs md:max-w-md lg:max-w-lg transition transform hover:translate-y-1 hover:opacity-80"
                        style="object-fit: contain;">
                </a>
            </div>
        </div>
    </div>

    {{-- 採用案内 （PC表示）--}}
    <div class="py-4 md:py-24 bg-cover bg-top bg-no-repeat hidden lg:block"
        style="background-image: url('{{ asset($recruitBackground->file_path . $recruitBackground->file_name) }}');">
        <div class="pt-8 mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleRecruit->file_path . $titleRecruit->file_name) }}" alt="タイトル"
                class="lg:h-24 md:h-18 h-8" style="object-fit: contain;">
        </div>

        <div class="container mx-auto px-8 flex items-center justify-center gap-6 my-12">
            <img src="{{ asset($person2->file_path . $person2->file_name) }}" alt="人1" class="mr-8 h-90 z-10"
                style="object-fit: contain;">
            <div class="space-y-6 flex flex-col items-center">

                <div class="text-center text-2xl xl:text-3xl leading-loose font-semibold" style="color: rgb(128,130,133)">
                    薬局はくばでは、<br>
                    一緒に働く仲間を<br>
                    募集しています。
                </div>
                <div class="mt-20 z-10 flex items-center justify-center">
                    <a href="{{ route($button4->spare1) }}">
                        <img src="{{ asset($button4->file_path . $button4->file_name) }}" alt="もっとみる"
                            class="md:h-20 h-12 transition transform hover:scale-105 hover:opacity-90">
                    </a>
                </div>
            </div>
            <img src="{{ asset($person1->file_path . $person1->file_name) }}" alt="人2" class="ml-8 h-90 z-10"
                style="object-fit: contain;">
        </div>

        {{-- もっと見るボタン：中央配置 --}}

    </div>


    {{-- 採用案内 （スマホ表示） --}}
    <div class="relative block lg:hidden">
        <img src="{{ asset($background4->file_path . $background4->file_name) }}" alt="タイトル" class=" w-full h-auto"
            style="object-fit: contain;">

        <div class="absolute inset-0 flex items-end justify-center pointer-events-none">
            <div class="mb-[10%] pointer-events-auto">
                <a href="{{ route($button4->spare1) }}">
                    <img src="{{ asset($button4->file_path . $button4->file_name) }}" alt="もっとみる"
                        class="h-auto w-[40vw] max-w-xs md:max-w-md lg:max-w-lg transition transform hover:translate-y-1 hover:opacity-80"
                        style="object-fit: contain;">
                </a>
            </div>
        </div>

    </div>

@endsection