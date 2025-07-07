@extends('layouts.app')

@section('title', '採用案内')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12 relative pb-4">
            <span class="inline-block relative z-10">採用案内</span>
            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
        </h1>

        {{-- Add the content for your recruitment page here --}}
        <div class="prose max-w-none">
            <p>ここに募集要項や福利厚生、働く環境についての情報を記述します。エントリーフォームへのリンクを設置することもできます。</p>
            <div class="mt-8 p-6 border rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">募集要項 (薬剤師)</h2>
                <ul class="mt-4 list-none space-y-2">
                    <li><strong>雇用形態:</strong> 正社員</li>
                    <li><strong>給与:</strong> 経験・能力を考慮の上、当社規定により決定します。</li>
                    <li><strong>勤務地:</strong> 埼玉県川口市内の各店舗</li>
                    <li><strong>福利厚生:</strong> 各種社会保険完備、交通費支給</li>
                </ul>
                <div class="mt-6 text-center">
                    <a href="#"
                        class="bg-green-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-700 transition-colors">
                        エントリーはこちら
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection