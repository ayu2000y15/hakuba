@extends('layouts.app')

@section('title', '店舗案内')

@section('content')
    {{-- スマホ表示 --}}
    <img src="{{ asset($background->file_path . $background->file_name) }}" alt="タイトル" class="w-full h-auto hidden"
        style="object-fit: contain;">

    {{-- PC表示 --}}
    <div class="relative py-4 md:py-24 bg-cover bg-top bg-no-repeat block"
        style="background-image: url('{{ asset($backgroundPc->file_path . $backgroundPc->file_name) }}');">

        <div class="pt-8 mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleStores->file_path . $titleStores->file_name) }}" alt="タイトル" class="lg:h-24 md:h-18 h-8"
                style="object-fit: contain;">
        </div>
        <div class="container md:w-[80%] mx-auto px-4 flex flex-col ">

            <div class="mt-8 md:mt-24 bg-white xs:text-sm md:text-2xl xl:text-5xl py-4 sm:py-12 px-2 sm:px-12 text-center"
                style="color: #75CCF3">
                各薬局にキッズスペース・駐車場を<br>
                完備しております。
            </div>

            <div class="relative">
                <div class=" flex flex-col lg:flex-row items-center lg:items-start gap-8 mt-8 md:mt-24">
                    <div class="flex-shrink-0">
                        <img src="{{ asset($storeImg1->file_path . $storeImg1->file_name) }}" alt="はくば薬局"
                            class="lg:h-70 xl:h-100 transition duration-300 hover:brightness-110"
                            style="object-fit: contain;">
                    </div>
                    <div class="flex-1 text-xl leading-loose " style="color: rgb(128,130,133)">
                        <p class="text-base md:text-2xl font-semibold">薬局はくば</p>
                        <p class="text-sm md:text-xl mt-2 md:mt-4">千葉県柏市若柴264番地1中央180街区1デュオセーヌ柏の葉キャンパス</p>
                        <p class="text-sm md:text-xl mt-2 md:mt-4">TEL : <a href="tel:04-7199-8988"
                                class="text-gray-500 hover:text-gray-800 hover:underline transition-colors duration-200">04-7199-8988</a>
                            / FAX : 04-7199-8982</p>
                        <img src="{{ asset($businessHour1->file_path . $businessHour1->file_name) }}" alt="営業時間"
                            class="w-full mt-2 md:mt-4" style="object-fit: contain;">
                        <p class="text-sm md:text-xl mt-2 md:mt-4 ">※土曜日は13:00まで営業</p>
                    </div>
                </div>

                <img src="{{ asset($balloon->file_path . $balloon->file_name) }}" alt="風船"
                    class="absolute -mt-8 right-5 md:right-30 md:h-30 h-20 z-10" style="object-fit: contain;">

                {{-- PC用 --}}
                <div class="xl:flex hidden  flex-col lg:flex-row items-center lg:items-start gap-8 mt-12 md:mt-48">
                    <div class="flex-1 text-2xl leading-loose " style="color: rgb(128,130,133)">
                        <p class="text-2xl font-semibold">薬局はくば 柏の葉キャンパス駅前店</p>
                        <p class="text-xl mt-4">千葉県柏市若柴276番地1中央154街区3ＰＣ<br>
                            柏の葉キャンパスブライトサイト2-2</p>
                        <p class="text-xl mt-4">TEL : <a href="tel:04-7192-8983"
                                class="text-gray-500 hover:text-gray-800 hover:underline transition-colors duration-200">04-7192-8983</a>
                            / FAX : 04-7192-8982</p>
                        <img src="{{ asset($businessHour2->file_path . $businessHour2->file_name) }}" alt="営業時間"
                            class="w-full mt-4" style="object-fit: contain;">
                    </div>
                    <div class="flex-shrink-0">
                        <img src="{{ asset($storeImg2->file_path . $storeImg2->file_name) }}" alt="はくば薬局柏の葉キャンパス駅前店"
                            class="xl:h-100 transition duration-300 hover:brightness-110" style="object-fit: contain;">
                    </div>
                </div>

                {{-- スマホ用 --}}
                <div class="block xl:hidden flex flex-col lg:flex-row items-center lg:items-start gap-8 mt-12 md:mt-48">
                    <div class="flex-shrink-0">
                        <img src="{{ asset($storeImg2->file_path . $storeImg2->file_name) }}" alt="はくば薬局柏の葉キャンパス駅前店"
                            class="lg:h-70 xl:h-100 transition duration-300 hover:brightness-110 z-20"
                            style="object-fit: contain;">
                    </div>
                    <div class="flex-1 text-2xl leading-loose " style="color: rgb(128,130,133)">
                        <p class="text-base md:text-2xl font-semibold">薬局はくば 柏の葉キャンパス駅前店</p>
                        <p class="text-sm md:text-xl mt-2 md:mt-4">千葉県柏市若柴276番地1中央154街区3ＰＣ<br>
                            柏の葉キャンパスブライトサイト2-2</p>
                        <p class="text-sm md:text-xl mt-2 md:mt-4">TEL : <a href="tel:04-7192-8983"
                                class="text-gray-500 hover:text-gray-800 hover:underline transition-colors duration-200">04-7192-8983</a>
                            / FAX : 04-7192-8982</p>
                        <img src="{{ asset($businessHour2->file_path . $businessHour2->file_name) }}" alt="営業時間"
                            class="w-full mt-4" style="object-fit: contain;">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection