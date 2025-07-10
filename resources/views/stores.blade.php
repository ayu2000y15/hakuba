@extends('layouts.app')

@section('title', '店舗案内')

@section('content')
    {{-- スマホ表示 --}}
    <img src="{{ asset($background->file_path . $background->file_name) }}" alt="タイトル" class="w-full h-auto xl:hidden"
        style="object-fit: contain;">

    {{-- PC表示 --}}
    <div class="relative py-4 md:py-24 bg-cover bg-top bg-no-repeat hidden xl:block"
        style="background-image: url('{{ asset($backgroundPc->file_path . $backgroundPc->file_name) }}');">

        <img src="{{ asset($titleStores->file_path . $titleStores->file_name) }}" alt="タイトル" class="lg:h-24 md:h-18 h-8"
            style="object-fit: contain;">
        <div class="container mx-auto px-4 flex flex-col ">

            <div class="mt-24 bg-white text-5xl  py-12 px-12 text-center" style="color: #75CCF3">
                各薬局にキッズスペース・駐車場を<br>
                完備しております。
            </div>

            <div class="relative">
                <div class=" flex flex-col lg:flex-row items-center lg:items-start gap-8 mt-24">
                    <div class="flex-shrink-0">
                        <img src="{{ asset($storeImg1->file_path . $storeImg1->file_name) }}" alt="はくば薬局"
                            class="h-100 transition duration-300 hover:brightness-110" style="object-fit: contain;">
                    </div>
                    <div class="flex-1 text-2xl leading-loose font-semibold" style="color: rgb(128,130,133)">
                        <span class="text-4xl">薬局はくば</span> <br>
                        千葉県柏市若柴264番地1中央180街区1デュオセーヌ柏の葉キャンパス<br>
                        TEL : 04-7199-8988 / FAX : 04-7199-8982
                        <img src="{{ asset($businessHour1->file_path . $businessHour1->file_name) }}" alt="営業時間"
                            class="w-full mt-4" style="object-fit: contain;">
                        <span class="text-2xl">※土曜日は13:00まで営業</span>
                    </div>
                </div>

                <img src="{{ asset($balloon->file_path . $balloon->file_name) }}" alt="風船"
                    class="absolute right-30 h-30 z-10" style="object-fit: contain;">

                <div class="flex flex-col lg:flex-row items-center lg:items-start gap-8 mt-48">
                    <div class="flex-1 text-2xl leading-loose font-semibold" style="color: rgb(128,130,133)">
                        <span class="text-4xl">薬局はくば 柏の葉キャンパス駅前店</span> <br>
                        千葉県柏市若柴276番地1中央154街区3ＰＣ<br>
                        柏の葉キャンパスブライトサイト2-2<br>
                        TEL : 04-7192-8983 / FAX : 04-7192-8982
                        <img src="{{ asset($businessHour2->file_path . $businessHour2->file_name) }}" alt="営業時間"
                            class="w-full mt-4" style="object-fit: contain;">
                    </div>
                    <div class="flex-shrink-0">
                        <img src="{{ asset($storeImg2->file_path . $storeImg2->file_name) }}" alt="はくば薬局柏の葉キャンパス駅前店"
                            class="h-100 transition duration-300 hover:brightness-110" style="object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection