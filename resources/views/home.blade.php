@extends('layouts.app')

@section('title', 'HOME')

@section('content')


    {{-- メインビジュアル --}}
    <div class="relative w-full">
        <img src="{{ asset($imgPc->file_path . $imgPc->file_name) }}" alt="メインビジュアル" class="w-full h-auto">
        <div class="relative z-10 flex flex-col items-center  h-full text-white text-center">
            <h1 class="mt-42">{!! $TopText->content !!}</h1>
        </div>
        {{-- <img src="{{ asset($imgUnder->file_path . $imgUnder->file_name) }}" alt="" class="h-6 ">
        --}}
        <a href="{{ route($button0->spare1) }}" class="flex justify-center">
            <img src="{{ asset($button0->file_path . $button0->file_name) }}" alt="採用案内"
                class="h-24 transition transform hover:translate-y-1 hover:opacity-80">
        </a>
    </div>

    {{-- 薬局はくばの取り組み --}}
    <div class="relative w-full">
        <img src="{{asset($background1->file_path . $background1->file_name) }}" alt="取り組み" class="w-full h-auto">
        {{-- <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12 relative pb-4">
                <span class="inline-block relative z-10">薬局はくばの取り組み</span>
                <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <img src="{{ asset('images/initiative1.jpg') }}" alt="取り組み1"
                        class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold mb-2">地域に根ざした医療</h3>
                    <p class="text-gray-700">地域住民の健康をサポートするため、きめ細やかなサービスを提供しています。</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <img src="{{ asset('images/initiative2.jpg') }}" alt="取り組み2"
                        class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold mb-2">専門知識と経験</h3>
                    <p class="text-gray-700">豊富な知識と経験を持つ薬剤師が、患者様一人ひとりに合わせた最適な薬を提供します。</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <img src="{{ asset('images/initiative3.jpg') }}" alt="取り組み3"
                        class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold mb-2">最新の設備</h3>
                    <p class="text-gray-700">調剤過誤防止のための最新機器を導入し、安全・安心な医療を提供します。</p>
                </div>
            </div> --}}
            <div class="absolute bottom-40 left-1/2 transform -translate-x-1/2 z-10">
                <a href="{{ route($button1->spare1) }}" class="flex justify-center">
                    <img src="{{ asset($button1->file_path . $button1->file_name) }}" alt="もっとみる"
                        class="h-24 transition transform hover:translate-y-1 hover:opacity-80">
                </a>
            </div>
        </div>

        {{-- 店舗案内 --}}
        <div class="relative w-full">
            <img src="{{ asset($background2->file_path . $background2->file_name) }}" alt="店舗案内"
                class="w-full h-auto object-cover">
            {{-- <div class="absolute bottom-40 left-1/2 transform -translate-x-1/2 z-10">
                <a href="#" class="flex justify-center">
                    <img src="{{ asset($button2->file_path . $button2->file_name) }}" alt="もっとみる"
                        class="h-24 transition transform hover:translate-y-1 hover:opacity-80">
                </a>
            </div> --}}
        </div>

        {{-- ABOUT US --}}
        <div class="relative w-full">
            <img src="{{ asset($background3->file_path . $background3->file_name) }}" alt="ABOUT US"
                class="w-full h-auto object-cover">
            <div class="absolute bottom-40 left-1/2 transform -translate-x-1/2 z-10">
                <a href="{{ route($button3->spare1) }}" class="flex justify-center">
                    <img src="{{ asset($button3->file_path . $button3->file_name) }}" alt="もっとみる"
                        class="h-24 transition transform hover:translate-y-1 hover:opacity-80">
                </a>
            </div>
        </div>

        {{-- 採用案内 --}}
        <div class="relative w-full">
            <img src="{{ asset($background4->file_path . $background4->file_name) }}" alt="採用案内"
                class="w-full h-auto object-cover">
            <div class="absolute bottom-40 left-1/2 transform -translate-x-1/2 z-10">
                <a href="{{ route($button4->spare1) }}" class="flex justify-center">
                    <img src="{{ asset($button4->file_path . $button4->file_name) }}" alt="もっとみる"
                        class="h-24 transition transform hover:translate-y-1 hover:opacity-80">
                </a>
            </div>
        </div>

@endsection