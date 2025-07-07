@extends('layouts.app')

@section('title', '店舗案内')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12 relative pb-4">
            <span class="inline-block relative z-10">店舗案内</span>
            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
        </h1>

        {{-- Add the content for your store guide here --}}
        <div class="prose max-w-none">
            <p>ここに店舗の一覧や各店舗の詳細情報を記述します。地図やアクセス方法、営業時間などを掲載すると良いでしょう。</p>
            {{-- Example of a single store item --}}
            <div class="mt-8 p-6 border rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">はくば薬局 本店</h2>
                <p class="mt-2"><strong>住所:</strong> 埼玉県川口市XXXX-XX</p>
                <p><strong>電話番号:</strong> 048-XXX-XXXX</p>
                <p><strong>営業時間:</strong> 9:00 AM - 6:00 PM (月-金)</p>
                <div class="mt-4 h-64 bg-gray-200 rounded">
                    {{-- Google Maps embed can go here --}}
                </div>
            </div>
        </div>
    </div>
@endsection