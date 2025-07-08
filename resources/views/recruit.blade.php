@extends('layouts.app')

@section('title', '採用案内')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* デザインに合わせたカスタムカラーを定義 */
        .bg-custom-orange-active {
            background-color: #f39e10;
        }

        .bg-custom-orange-inactive {
            background-color: #FAD9A6;
        }

        .text-custom-brown {
            color: white;
        }
    </style>
    <div class="container mx-auto p-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12 relative pb-4">
            <span class="inline-block relative z-10">採用案内</span>
            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
        </h1>

        {{-- Add the content for your recruitment page here --}}
        <div class="mt-8 py-6 " style="background-color: #faf4dd">
            <h2 class="text-2xl text-center text-orange-400 font-bold mb-6">募集情報</h2>

            <div x-data="{ activeTab: 1 }" class="max-w-4xl md:mx-auto mx-2 text-white">
                {{-- タブタイトル部分 --}}
                <ul class="flex items-end -mb-px gap-0.5 mr-0.5">
                    {{-- @foreachで$textRecruitmentの要素数だけタブを生成 --}}
                    @foreach ($textRecruitment as $recruitment)
                        {{--
                        - @click.prevent="activeTab = {{ $loop->iteration }}" でクリック時に対応するタブ番号をセット
                        - :classの条件式も $loop->iteration を使うように変更
                        - Laravelの@classディレクティブで、2番目のタブにだけ左右の境界線を追加
                        --}}
                        <li @class([
                            'flex-1',
                            'text-center',
                        ]) @click.prevent="activeTab = {{ $loop->iteration }}"
                            :class="{ 'z-10': activeTab === {{ $loop->iteration }} }">
                            <a href="#" class="block w-full px-4 py-3 rounded-t-2xl border-b-0 transition-colors duration-300"
                                :class="{
                                                                                                                                                                                                                                                                                                                                                                            'bg-custom-orange-active text-custom-brown': activeTab === {{ $loop->iteration }},
                                                                                                                                                                                                                                                                                                                                                                            'bg-custom-orange-inactive text-custom-brown hover:bg-orange-300': activeTab !== {{ $loop->iteration }}
                                                                                                                                                                                                                                                                                                                                                                        }">
                                {{-- ループ内の$recruitmentから動的にテキストをセット --}}
                                <p class="text-xl font-bold">
                                    {{ $recruitment->industry['value'] }}<br>
                                    <span
                                        class="px-4 text-sm font-normal bg-amber-50 text-orange-500">{{ $recruitment->employment_type['value'] }}</span>
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- タブコンテンツ部分 --}}
                <div class="bg-custom-orange-active p-8 shadow-lg mr-0.5">
                    {{-- こちらも@foreachでループさせ、対応するコンテンツを生成 --}}
                    @foreach ($textRecruitment as $recruitment)
                        {{--
                        - x-show="activeTab === {{ $loop->iteration }}" でアクティブなタブに対応するコンテンツのみ表示
                        - @includeにループ内の$recruitment変数を渡す
                        --}}
                        <div x-show="activeTab === {{ $loop->iteration }}" class="space-y-4">
                            @include('partials.recruitment-details', ['recruitment' => $recruitment])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection