@extends('layouts.app')
@section('title', 'ABOUT US')

@section('content')
    {{-- スマホ表示 --}}
    <div class="relative xl:hidden">
        <img src="{{ asset($background->file_path . $background->file_name) }}" alt="タイトル" class=" w-full h-auto "
            style="object-fit: contain;">
        <div class="absolute inset-0 flex items-end justify-center pointer-events-none z-20">
            <div class="mb-[5%] pointer-events-auto">
                <a href="{{ route($button->spare1) }}">
                    <img src="{{ asset($button->file_path . $button->file_name) }}" alt="採用案内"
                        class="mb-10 h-auto w-[60vw] max-w-xs md:max-w-md lg:max-w-lg transition transform hover:translate-y-1 hover:opacity-80"
                        style="object-fit: contain;">
                </a>
            </div>
        </div>
    </div>

    {{-- PC表示 --}}
    <div class="relative mx-auto py-4 md:py-24 bg-cover bg-top bg-no-repeat hidden xl:block"
        style="background-image: url('{{ asset($backgroundPc->file_path . $backgroundPc->file_name) }}');">

        <img src="{{ asset($titleAbout->file_path . $titleAbout->file_name) }}" alt="タイトル" class="lg:h-24 md:h-18 h-8"
            style="object-fit: contain;">
        <div class="container w-[80%] mx-auto px-4 flex flex-col ">

            <div class="relative mt-12 text-4xl leading-loose font-semibold" style="color: rgb(128,130,133)">
                薬局はくばはスタッフ全員が楽しく・明るく働き、<br>
                患者さんから親しまれる薬局を目指しています
                <img src="{{ asset($balloon->file_path . $balloon->file_name) }}" alt="風船"
                    class="absolute top-20 right-30 h-30 z-10" style="object-fit: contain;">
            </div>

            {{-- 質問 --}}
            <div class="max-w-8xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-30 gap-y-12">
                    {{-- 1つ目の質問 --}}
                    <div class="relative flex-col items-center">
                        <img src="{{ asset($content1->file_path . $content1->file_name) }}" alt="{{  $content1->comment }}"
                            class="mt-12 h-90 z-10" style="object-fit: contain;">
                        <div class="text-xl leading-loose  " style="color: rgb(128,130,133)">
                            働く社員の負担を減らし、<br>
                            仕事とプライベートの両立をサポートしています。
                        </div>
                    </div>

                    {{-- 2つ目の質問 --}}
                    <div class="relative  flex-col items-center">
                        <img src="{{ asset($content2->file_path . $content2->file_name) }}" alt="{{  $content2->comment }}"
                            class="mt-12 h-90 z-10" style="object-fit: contain;">
                        <div class="text-xl leading-loose" style="color: rgb(128,130,133)">
                            子育て中の社員も多数在籍。<br>
                            ライフスタイルに合わせた働き方を支援しており、<br>
                            仕事と家庭の両立が可能な職場です
                        </div>
                    </div>

                    {{-- 3つ目の質問 --}}
                    <div class="relative flex-col items-center">
                        <img src="{{ asset($content3->file_path . $content3->file_name) }}" alt="{{  $content3->comment }}"
                            class="mt-12 h-90 z-10" style="object-fit: contain;">
                        <div class="text-xl leading-loose" style="color: rgb(128,130,133)">
                            社員一人ひとりの“やりたい”を尊重し、<br>
                            成長や挑戦を支える制度を整えています。<br>
                            スキルアップやキャリア形成を会社がバックアップします
                        </div>
                    </div>

                    {{-- 4つ目の質問 --}}
                    <div class="relative flex-col items-center">
                        <img src="{{ asset($content4->file_path . $content4->file_name) }}" alt="{{  $content4->comment }}"
                            class="mt-12 h-100 z-10" style="object-fit: contain;">
                        <div class="text-xl leading-loose" style="color: rgb(128,130,133)">
                            <span class="underline">主に扱う診療科</span><br>
                            小児科・皮膚科・耳鼻咽喉科・婦人科<br>
                            内科・呼吸器科・整形外科<br>
                            幅広い診療科を学ぶことが可能です。
                        </div>
                    </div>
                </div>
            </div>
            <div class="inset-0 flex items-end justify-center pointer-events-none z-20">
                <div class="mt-24 pointer-events-auto">
                    <a href="{{ route($button->spare1) }}">
                        <img src="{{ asset($button->file_path . $button->file_name) }}" alt="採用案内"
                            class="mb-10 h-auto w-[60vw] max-w-xs md:max-w-md lg:max-w-lg transition transform hover:translate-y-1 hover:opacity-80"
                            style="object-fit: contain;">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection