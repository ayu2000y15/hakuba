@extends('layouts.app')

@section('title', '薬局はくばの取り組み')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12 relative pb-4">
            <span class="inline-block relative z-10">薬局はくばの取り組み</span>
            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
        </h1>

        {{-- Add the content for your initiatives here --}}
        <div class="prose max-w-none">
            <p>ここに「薬局はくばの取り組み」に関する詳細な内容を記述します。例えば、地域医療への貢献、専門的な薬剤師の育成、最新設備による安全性向上など、具体的な活動を紹介します。</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
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
            </div>
        </div>
    </div>
@endsection