@extends('layouts.app')

@section('title', 'ABOUT US')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12 relative pb-4">
            <span class="inline-block relative z-10">ABOUT US</span>
            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
        </h1>

        {{-- Add the content for your about us page here --}}
        <div class="prose max-w-none">
            <p>ここに会社概要、理念、沿革などを記述します。代表挨拶や企業のビジョンなどを紹介するセクションです。</p>
            <div class="mt-8 p-6 bg-gray-50 rounded-lg">
                <h2 class="text-2xl font-bold">会社概要</h2>
                <ul class="mt-4 list-none space-y-2">
                    <li><strong>会社名:</strong> 株式会社はくば</li>
                    <li><strong>設立:</strong> XXXX年XX月XX日</li>
                    <li><strong>代表者:</strong> 代表取締役 〇〇 〇〇</li>
                    <li><strong>事業内容:</strong> 保険調剤薬局の運営</li>
                </ul>
            </div>
        </div>
    </div>
@endsection