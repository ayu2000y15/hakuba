@extends('layouts.app')

@section('title', '採用案内')

@section('content')
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
    <div class="relative py-4 md:py-24 bg-cover bg-top bg-no-repeat"
        style="background-image: url('{{ asset($background->file_path . $background->file_name) }}');">

        <div class="pt-2 mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleRecruit->file_path . $titleRecruit->file_name) }}" alt="タイトル"
                class="lg:h-24 md:h-18 h-10" style="object-fit: contain;">
        </div>
        <div class="container md:w-[80%] mx-auto p-4 py-12">
            {{-- Add the content for your recruitment page here --}}
            <div class="mt-8 py-6 " style="background-color: #faf4dd">
                <h2 class="text-2xl md:text-4xl text-center text-orange-400 mb-6">募集情報</h2>

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
                                <a href="#"
                                    class="block w-full px-4 py-3 rounded-t-2xl border-b-0 transition-colors duration-300"
                                    :class="{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                'bg-custom-orange-active text-custom-brown': activeTab === {{ $loop->iteration }},
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    'bg-custom-orange-inactive text-custom-brown hover:bg-orange-300': activeTab !== {{ $loop->iteration }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }">
                                    {{-- ループ内の$recruitmentから動的にテキストをセット --}}
                                    <p class="text-base md:text-xl font-bold">
                                        {{ $recruitment->industry['value'] }}<br>
                                        <span
                                            class="px-4 text-xs md:text-sm font-normal bg-amber-50 text-orange-500">{{ $recruitment->employment_type['value'] }}</span>
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
        {{-- PC表示 --}}
        <div class="hidden xl:block">
            <div class="mt-24">
                <span class="pr-8 pt-4 pb-2 text-5xl bg-custom-orange-active underline" style="color: #fcebbe;">
                    　　　採用に関するお問い合わせ</span>
            </div>
            <div class="container w-[80%] mx-auto ">
                <div class="relative mt-24 flex flex-row items-start justify-center" style="color: #f39e10;">
                    <div class="py-4 px-4 rounded-2xl flex-shrink-0 relative z-10"
                        style="background-color: rgba(255,255,255,0.6);">
                        <div class=" flex items-center gap-4 text-2xl rounded-2xl py-4 px-6">
                            <img src="{{ asset($mailIcon->file_path . $mailIcon->file_name) }}" alt="メール"
                                class="h-16 flex-shrink-0" style="object-fit: contain;">
                            <p><a class="underline font-bold hover:bg-orange-100 hover:text-orange-600 transition-colors duration-300 px-1 py-0.5 rounded"
                                    href="mailto:some88@outlook.jp?subject=【HPからのお問い合わせ】">some88@outlook.jp</a>よりご連絡ください。
                            </p>
                        </div>
                        <p class="text-3xl font-bold text-center py-2 px-8 tracking-[0.2em]">
                            直接応募頂いた方を優先いたします</p>
                        <hr class="mb-4 mt-2 mx-8 border-dashed border-2" style="color: #f39e10;">
                        <div class="mx-8 border-2 border-orange-400 p-1">
                            <div class=" bg-custom-orange-active">
                                <p class="text-2xl text-white py-4 px-8">
                                    直接応募された方で半年間勤務継続された方には<br>
                                    お祝い金を支給致します。
                                </p>
                            </div>
                        </div>
                        <p class="text-xl">※正社員薬剤師100,000円 / パート薬剤師50,000円/パート医療事務20,000円</p>
                    </div>
                    <img src="{{ asset($person->file_path . $person->file_name) }}" alt="人"
                        class="absolute 2xl:right-20 xl:right-0 right-0 -top-15 h-90 z-20  2xl:block"
                        style="object-fit: contain;">
                </div>

                <div class="mt-24 px-12 py-12 rounded-4xl bg-white max-w-6xl mx-auto shadow-2xl"
                    style="box-shadow: 8px 8px 0px 0px rgba(243, 158, 16,0.3);">
                    <div class="-mt-12 flex flex-row items-start gap-8 z-20">
                        <div class="relative">
                            <img src="{{ asset($titleBg->file_path . $titleBg->file_name) }}" alt="背景" class="h-150"
                                style="object-fit: contain;">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <p class="text-4xl  text-white vertical-text"
                                    style="writing-mode: vertical-lr; text-orientation: upright;">
                                    よくある質問</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 justify-right flex-1">
                            @foreach($qa as $qaItem)
                                <img src="{{ asset($qaItem->file_path . $qaItem->file_name) }}" alt="QA"
                                    class="mt-12 mx-12 w-[80%]" style="object-fit: contain;">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- スマホ表示 --}}
        <div class="xl:hidden ">
            <div class="pt-2 mt-0 flex flex-row items-center gap-8 z-20">
                <img src="{{ asset($qaTitle->file_path . $qaTitle->file_name) }}" alt="タイトル" class="w-[80%]"
                    style="object-fit: contain;">
            </div>
            <div class="w-[80%] mx-auto my-4 flex justify-center">
                <a href="mailto:some88@outlook.jp?subject=【HPからのお問い合わせ】" class="transition-opacity hover:opacity-80">
                    <img src="{{ asset($mailMobile->file_path . $mailMobile->file_name) }}" alt="" class="w-full"
                        style="object-fit: contain;">
                </a>
            </div>
            <div class="mx-2 my-12">
                <img src="{{ asset($qaContent->file_path . $qaContent->file_name) }}" alt="" class="w-full mx-auto "
                    style="object-fit: contain;">
            </div>
        </div>

@endsection