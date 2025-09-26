@extends('layouts.app')

@section('title', '取り組み詳細 - 薬局はくばの取り組み')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/rich-text-content.css') }}">
    <style>
        /* initiatives-detail に埋め込まれた画像を均一に表示する。
           - 最大横幅を揃えて中央寄せにする
           - 高さは auto にして見切れないようにする
           - インラインスタイルが入っている場合でも上書きするよう !important を使用
        */
        .initiative-content img,
        .initiative-content figure img {
            display: block;
            margin: 1rem auto;
            max-width: 720px; /* 必要なら値を調整してください */
            width: 40% !important;
            height: auto !important;
            object-fit: contain;
        }

        /* 埋め込み動画や iframe のはみ出しも防止 */
        .initiative-content iframe,
        .initiative-content video,
        .initiative-content embed {
            max-width: 100%;
            width: 100%;
        }

        /* 長いテーブルや要素の横スクロールを防ぎ、レスポンシブに */
        .initiative-content {
            overflow-wrap: anywhere;
            word-break: break-word;
        }
    </style>
@endsection

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="relative py-8 md:py-24 bg-cover bg-top bg-no-repeat"
        style="background-image: url('{{ asset($background1->file_path . $background1->file_name) }}');">

        {{-- タイトル --}}
        <div class="md:pt-0 pt-8  mt-0 flex flex-row items-center gap-8 z-20">
            <img src="{{ asset($titleInitiatives->file_path . $titleInitiatives->file_name) }}" alt="タイトル"
                class="md:h-18 h-12" style="object-fit: contain;">
        </div>

        <div class="container mx-auto px-4 flex flex-col items-center relative">
            <div class="w-full max-w-3xl rounded-2xl relative" style="background-color: rgba(255, 255, 255, 0);">
                <img src="{{ asset($car->file_path . $car->file_name) }}" alt="車"
                    class="absolute -top-4 -right-0 md:-top-21 md:h-30 h-12 z-10" style="object-fit: contain;">

                {{-- 詳細コンテンツ --}}
                <div class="mt-8 w-full max-w-4xl mx-auto">
                    @if($initiativeContent)

                        <div class="rounded-2xl p-6 md:p-8" style="background-color: rgba(255, 255, 255, 0.6);">

                            {{-- タイトル --}}
                            <h1 class="text-2xl font-bold text-green-800 mb-6 text-left">
                                {{ $initiativeContent->attempt["value"] }}
                            </h1>
                            <hr class="border-green-800 border-2 mb-4 md:mb-12">
                            {{-- 詳細コンテンツ --}}
                            <div class="text-green-800 text-base md:text-lg leading-relaxed" >
                                <div>
                                    <p>{!! nl2br($initiativeContent->home_content["value"]) !!}</p>
                                    <br><br>
                                    <div class="initiative-content">
                                        {!! $initiativeContent->attempt_content["value"] !!}
                                    </div>
                                </div>
                            </div>

                            {{-- 前後の投稿への移動ボタン --}}
                            <div class="mt-24">
                                {{-- デスクトップ表示 --}}
                                <div class="flex justify-between items-center">
                                    {{-- 前の投稿ボタン --}}
                                    @if($previousPost)
                                        <a href="{{ route('initiatives.detail', $previousPost->id) }}"
                                            style="background-image: url('{{ asset($btnBackground->file_path . $btnBackground->file_name) }}');"
                                            class="flex items-center px-4 py-3 text-white bg-cover bg-center rounded-sm hover:opacity-80 transition duration-200 group">
                                            <i class="text-[15px] fas fa-caret-left mr-2"></i>
                                            <div class="text-left">
                                                <div class="text-xs opacity-75">previous</div>
                                                <div class="text-sm font-bold">{{ Str::limit($previousPost->attempt["value"], 15) }}</div>
                                            </div>
                                        </a>
                                    @else
                                        <div class="flex items-center px-4 py-3 bg-gray-400 text-white rounded-sm cursor-not-allowed opacity-50">
                                            <i class="fas fa-caret-left mr-2"></i>
                                            <div class="text-left">
                                                <div class="text-xs opacity-75">previous</div>
                                                <div class="text-sm font-bold">最初の投稿です</div>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- 次の投稿ボタン --}}
                                    @if($nextPost)
                                        <a href="{{ route('initiatives.detail', $nextPost->id) }}"
                                            style="background-image: url('{{ asset($btnBackground->file_path . $btnBackground->file_name) }}');"
                                            class="flex items-center px-4 py-3 text-white bg-cover bg-center rounded-sm hover:opacity-80 transition duration-200">
                                            <div class="text-right">
                                                <div class="text-xs opacity-75">next</div>
                                                <div class="text-sm font-bold">{{ Str::limit($nextPost->attempt["value"], 15) }}</div>
                                            </div>
                                            <i class="fas fa-caret-right ml-2"></i>
                                        </a>
                                    @else
                                        <div class="flex items-center px-4 py-3 bg-gray-400 text-white rounded-sm cursor-not-allowed opacity-50">
                                            <div class="text-right">
                                                <div class="text-xs opacity-75">next</div>
                                                <div class="text-sm font-bold">最後の投稿です</div>
                                            </div>
                                            <i class="fas fa-caret-right ml-2"></i>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @else
                        {{-- コンテンツが見つからない場合の表示 --}}
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- 画像プレビューモーダル --}}
    @if(!empty($images))
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 items-center justify-center z-50 hidden">
            <div class="relative w-full h-full flex items-center justify-center p-4">
                <button id="closeModal"
                    class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300 transition duration-200 z-10"><i
                        class="fas fa-times"></i></button>

                <div class="relative w-full max-w-6xl h-full flex items-center justify-center">
                    <div class="overflow-hidden w-full h-full flex items-center justify-center">
                        <div class="flex transition-transform duration-300 ease-in-out" id="modalSlider">
                            @foreach($images as $index => $contentImg)
                                <div class="w-full flex-shrink-0 h-full flex items-center justify-center">
                                    <img src="{{ asset($contentImg) }}" alt="コンテンツ画像 {{ $index + 1 }}"
                                        class="max-w-full max-h-full object-contain">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if($imageCount > 1)
                        <button type="button" id="modalPrevBtn"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 transition duration-200"><i
                                class="fas fa-chevron-left text-xl"></i></button>
                        <button type="button" id="modalNextBtn"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 transition duration-200"><i
                                class="fas fa-chevron-right text-xl"></i></button>

                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            @for($i = 0; $i < $imageCount; $i++)
                                <button type="button"
                                    class="w-4 h-4 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition duration-200 modal-dot-indicator {{ $i === 0 ? 'bg-opacity-100' : '' }}"
                                    data-slide="{{ $i }}"></button>
                            @endfor
                        </div>

                        <div class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-lg"><span
                                id="modalCurrentSlide">1</span> / {{ $imageCount }}</div>
                    @endif
                </div>
            </div>
        </div>
    @endif

{{-- スライドショーのJavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const totalSlides = {{ $imageCount ?? 0 }};
            if (totalSlides === 0) return; // 画像がなければ何もしない

            // メインスライダーの要素
            const slider = document.getElementById('imageSlider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const currentSlideElement = document.getElementById('currentSlide');
            const dotIndicators = document.querySelectorAll('.dot-indicator');

            let currentSlide = 0;
            let autoSlideInterval;

            // モーダルの要素
            const imageElements = document.querySelectorAll('.clickable-image');
            const imageModal = document.getElementById('imageModal');
            const modalSlider = document.getElementById('modalSlider');
            const closeModalBtn = document.getElementById('closeModal');
            const modalPrevBtn = document.getElementById('modalPrevBtn');
            const modalNextBtn = document.getElementById('modalNextBtn');
            const modalCurrentSlideElement = document.getElementById('modalCurrentSlide');
            const modalDotIndicators = document.querySelectorAll('.modal-dot-indicator');

            let currentModalSlide = 0;

            // --- メインスライダーのロジック ---
            function updateSlider() {
                if (!slider) return;
                slider.style.transform = `translateX(${-currentSlide * 100}%)`;
                if (currentSlideElement) currentSlideElement.textContent = currentSlide + 1;
                dotIndicators.forEach((dot, index) => {
                    dot.classList.toggle('bg-opacity-100', index === currentSlide);
                    dot.classList.toggle('bg-opacity-50', index !== currentSlide);
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateSlider();
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            function startAutoSlide() {
                // ★ 修正箇所: 最初に既存のタイマーをクリアして、重複を防ぐ
                stopAutoSlide();
                if (totalSlides > 1) {
                    autoSlideInterval = setInterval(nextSlide, 5000);
                }
            }

            if (totalSlides > 1 && slider) {
                startAutoSlide();
                slider.addEventListener('mouseenter', stopAutoSlide);
                slider.addEventListener('mouseleave', startAutoSlide);

                nextBtn.addEventListener('click', () => {
                    // ボタンクリック時はタイマーをリセットするため stop/start を呼ぶ
                    stopAutoSlide();
                    nextSlide();
                    startAutoSlide();
                });

                prevBtn.addEventListener('click', () => {
                    stopAutoSlide();
                    prevSlide();
                    startAutoSlide();
                });

                dotIndicators.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        stopAutoSlide();
                        currentSlide = index;
                        updateSlider();
                        startAutoSlide();
                    });
                });
            }

            // --- モーダルのロジック ---
            function updateModalSlider() {
                if (!modalSlider) return;
                const slideWidth = modalSlider.querySelector('div').offsetWidth;
                modalSlider.style.transform = `translateX(${-currentModalSlide * slideWidth}px)`;

                if (modalCurrentSlideElement) modalCurrentSlideElement.textContent = currentModalSlide + 1;

                modalDotIndicators.forEach((dot, index) => {
                    dot.classList.toggle('bg-opacity-100', index === currentModalSlide);
                    dot.classList.toggle('bg-opacity-50', index !== currentModalSlide);
                });
            }

            function nextModalSlide() {
                currentModalSlide = (currentModalSlide + 1) % totalSlides;
                updateModalSlider();
            }

            function prevModalSlide() {
                currentModalSlide = (currentModalSlide - 1 + totalSlides) % totalSlides;
                updateModalSlider();
            }

            function openModal(imageIndex = 0) {
                stopAutoSlide();
                currentModalSlide = imageIndex;
                if (imageModal) {
                    updateModalSlider();
                    imageModal.classList.remove('hidden');
                    imageModal.classList.add('flex');
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeModal() {
                if (imageModal) {
                    imageModal.classList.add('hidden');
                    imageModal.classList.remove('flex');
                    document.body.style.overflow = 'auto';
                    startAutoSlide();
                }
            }

            imageElements.forEach((img) => {
                img.addEventListener('click', function () {
                    const imageIndex = parseInt(this.getAttribute('data-image-index')) || 0;
                    openModal(imageIndex);
                });
            });

            if (imageModal) {
                closeModalBtn.addEventListener('click', closeModal);
                imageModal.addEventListener('click', (e) => e.target === imageModal && closeModal());

                if (totalSlides > 1) {
                    modalNextBtn.addEventListener('click', nextModalSlide);
                    modalPrevBtn.addEventListener('click', prevModalSlide);
                    modalDotIndicators.forEach((dot, index) => {
                        dot.addEventListener('click', () => {
                            currentModalSlide = index;
                            updateModalSlider();
                        });
                    });
                }
            }

            // --- キーボード操作 ---
            document.addEventListener('keydown', function (event) {
                const isModalOpen = imageModal && !imageModal.classList.contains('hidden');
                if (event.key === 'Escape' && isModalOpen) closeModal();
                if (event.key === 'ArrowLeft') {
                    isModalOpen ? prevModalSlide() : (totalSlides > 1 && prevBtn.click());
                }
                if (event.key === 'ArrowRight') {
                    isModalOpen ? nextModalSlide() : (totalSlides > 1 && nextBtn.click());
                }
            });
        });
    </script>
@endsection
