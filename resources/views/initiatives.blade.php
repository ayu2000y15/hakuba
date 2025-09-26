@extends('layouts.app')

@section('title', '薬局はくばの取り組み')

@section('content')
    {{-- ★変更点1: 'relative'クラスを追加して、このdivを絶対配置の基準にする --}}
    <div class="relative py-8 md:py-24 bg-cover bg-top bg-no-repeat"
        style="background-image: url('{{ asset($background1->file_path . $background1->file_name) }}');">

        {{-- タイトル --}}
        <div class="md:pt-0 pt-8  mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleInitiatives->file_path . $titleInitiatives->file_name) }}" alt="タイトル"
                class="md:h-18 h-8" style="object-fit: contain;">
        </div>

        <div class="container mx-auto px-4 flex flex-col items-center relative">
            <div class="w-full max-w-5xl rounded-2xl  relative" style="background-color: rgba(255, 255, 255, 0);">
                <!-- 車の画像を白い枠の右上角（外側）に配置 -->

                <img src="{{ asset($car->file_path . $car->file_name) }}" alt="車"
                    class="absolute -top-4 -right-0 md:-top-21 md:h-30 h-12 z-10" style="object-fit: contain;">
                {{-- グリッドコンテナで2列表示を指定 --}}
                <div class="mt-8 w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                    @foreach ($initiativeContents as $content)
                        {{-- 各コンテンツのコンテナ (白枠) --}}
                        <div class="rounded-lg p-6 md:p-8 flex flex-row items-start gap-4 max-w-4xl mx-auto"
                            style="background-color: rgba(255, 255, 255, 0.6);">
                            <div class="w-1/3 flex-shrink-0">
                                @if (!empty($content->attempt_img["value"]))
                                    @php
                                        $contentImg = $content->attempt_img["value"];
                                    @endphp
                                    <img src="{{ asset($contentImg) }}" alt="コンテンツ画像"
                                        class="w-full h-auto object-contain shadow-lg rounded-sm">
                                @endif
                            </div>
                            <div class="flex-1 text-left text-green-800  flex flex-col">
                                <h2 class="mb-2 md:mb-4 text-lg md:text-xl font-bold">{{ $content->attempt["value"] }}</h2>
                                <div class="mb-auto text-sm">
                                    {!! nl2br($content->home_content["value"]) !!}
                                </div>
                                <a href="{{ route('initiatives.detail', $content->id) }}"
                                    class="block mt-4 py-2 transition duration-200 ease-in-out hover:opacity-75 ml-auto w-fit">
                                    <i class="fas fa-arrow-right"></i> 続きを読む
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- ページネーション -->
                @if($pagination['total_pages'] > 1)
                    <div class="flex justify-center items-center space-x-4 mt-8">
                        <!-- 前のページ -->
                        @if($pagination['current_page'] > 1)
                            @php
                                $prevPage = $pagination['current_page'] - 1;
                                $prevPageUrl = url()->current() . '?page=' . $prevPage;
                            @endphp
                            <a href="{{ $prevPageUrl }}"
                                class="px-2 py-0 text-[30px] text-green-800 rounded hover:bg-green-700 transition duration-200"
                                title="前のページ ({{ $prevPage }})">
                                <i class="fas fa-caret-left"></i>
                            </a>
                        @else
                            <span class="px-2 py-0 text-[30px] text-gray-500 rounded cursor-not-allowed">
                                <i class="fas fa-caret-left"></i>
                            </span>
                        @endif

                        <!-- ページ番号 -->
                        <div class="flex space-x-2">
                            @for($i = 1; $i <= $pagination['total_pages']; $i++)
                                @if($i == $pagination['current_page'])
                                    <span
                                        class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center font-bold text-lg">{{ $i }}</span>
                                @else
                                    <a href="{{ url()->current() }}?page={{ $i }}"
                                        class="w-10 h-10 text-green-800 rounded-full flex items-center justify-center hover:bg-green-300 transition duration-200 text-lg font-medium">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor
                        </div>

                        <!-- 次のページ -->
                        @if($pagination['current_page'] < $pagination['total_pages'])
                            @php
                                $nextPage = $pagination['current_page'] + 1;
                                $nextPageUrl = url()->current() . '?page=' . $nextPage;
                            @endphp
                            <a href="{{ $nextPageUrl }}"
                                class="px-2 py-0 text-[30px] text-green-800 rounded hover:bg-green-700 transition duration-200"
                                title="次のページ ({{ $nextPage }})">
                                <i class="fas fa-caret-right"></i>
                            </a>
                        @else
                            <span class="px-2 py-0 text-[30px] text-gray-500 rounded cursor-not-allowed">
                                <i class="fas fa-caret-right"></i>
                            </span>
                        @endif
                    </div>

                    <!-- ページ情報 -->
                    <div class="text-center mt-4 text-green-800 text-sm">
                        {{ $pagination['total_count'] }}件中
                        {{ (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 }}〜{{ min($pagination['current_page'] * $pagination['per_page'], $pagination['total_count']) }}件を表示
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection