{{-- idを追加し、fixedやtransitionなどのクラスを設定 --}}
<header id="main-header"
    class="fixed top-0 left-0 right-0 z-40 bg-white py-2 shadow-sm transition-transform duration-300 ease-in-out">
    <div class="container mx-auto px-4 flex justify-between items-center">
        {{-- 左側: ロゴ --}}
        <div class="flex-shrink-0">
            <a href="/" aria-label="トップページへ">
                <div class="flex items-center">
                    {{-- PC表示：両方のロゴを表示 --}}
                    <img src="{{ asset($logo1->file_path . $logo1->file_name) }}" alt="ロゴ" class="h-8 hidden md:block">
                    <img src="{{ asset($logo2->file_path . $logo2->file_name) }}" alt="薬局はくば"
                        class="h-8 ml-2 hidden md:block">

                    {{-- スマホ表示：左側にlogo1のみ --}}
                    <img src="{{ asset($logo1->file_path . $logo1->file_name) }}" alt="ロゴ" class="h-8 md:hidden">
                </div>
            </a>
        </div>

        {{-- 中央: スマホ用logo2とPC用ナビゲーションメニュー --}}
        <div class="flex items-center">
            {{-- スマホ表示：中央にlogo2 --}}
            <div class="md:hidden">
                <a href="/" aria-label="トップページへ">
                    <img src="{{ asset($logo2->file_path . $logo2->file_name) }}" alt="薬局はくば" class="h-8">
                </a>
            </div>

            {{-- PC用ナビゲーションメニュー --}}
            <nav class="hidden md:flex space-x-6">
                @foreach ($menuItem as $item)
                    <a href="{{ route($item->spare1) }}" class="py-2">
                        <img src="{{ asset($item->file_path . $item->file_name) }}" alt="{{ $item->comment }}"
                            class="h-5 hover:opacity-80 transition-opacity">
                    </a>
                @endforeach
            </nav>
        </div>

        {{-- 右側: PC用 採用案内ボタン --}}
        <div class="hidden md:block">
            <a href="{{ route($menuButton->spare1) }}" class="inline-block">
                <img src="{{ asset($menuButton->file_path . $menuButton->file_name) }}" alt="採用案内"
                    class="h-10 hover:opacity-80 transition-opacity">
            </a>
        </div>

        {{-- モバイル用ハンバーガーメニューボタン --}}
        <div class="md:hidden">
            <button id="hamburger-button" class="text-gray-700 focus:outline-none" aria-label="メニューを開く">
                <img src="{{ asset($menuIcon->file_path . $menuIcon->file_name) }}" alt="メニュー" class="h-12">
            </button>
        </div>
    </div>

    {{-- モバイル用 オーバーレイメニュー --}}
    {{-- z-50にしてヘッダー(z-40)より手前に表示 --}}
    <div id="mobile-menu" class="hidden fixed inset-0 bg-white z-50 p-6">
        {{-- 閉じるボタンを右上に配置 --}}
        <button id="close-menu-button" class="absolute top-6 right-6 z-10" aria-label="メニューを閉じる">
            <svg class="h-8 w-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="relative mb-10">
            <a href="/" aria-label="トップページへ">
                <div class="flex justify-center items-center">
                    <img src="{{ asset($logo1->file_path . $logo1->file_name) }}" alt="ロゴ" class="h-10">
                    <img src="{{ asset($logo2->file_path . $logo2->file_name) }}" alt="薬局はくば" class="h-10 ml-2">
                </div>
            </a>
            <div class="flex justify-center items-center">
                <img src="{{ asset($menuTitle->file_path . $menuTitle->file_name) }}" alt="タイトル" class="h-9 mt-12 ">
            </div>
        </div>

        <div class="flex flex-col">
            <nav class="w-full flex flex-col items-start space-y-4">
                @foreach ($menuItem as $item)
                    <a href="{{ route($item->spare1) }}" class="py-2">
                        <img src="{{ asset($item->file_path . $item->file_name) }}" alt="{{ $item->comment }}"
                            class="h-8 hover:opacity-80 transition-opacity">
                    </a>
                    @if (!$loop->last)
                        <div class="border-b border-orange-300 w-full"></div>
                    @endif
                @endforeach
            </nav>

            <div class="mt-10 text-center">
                <a href="{{ route($menuButton->spare1) }}" class="inline-block">
                    <img src="{{ asset($menuButton->file_path . $menuButton->file_name) }}" alt="採用案内"
                        class="h-12 hover:opacity-80 transition-opacity">
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- 既存のハンバーガーメニューのスクリプト ---
        const hamburgerButton = document.getElementById('hamburger-button');
        const closeMenuButton = document.getElementById('close-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        let isMenuOpen = false;

        function openMenu() {
            if (mobileMenu) {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // スクロールを無効化
                isMenuOpen = true;
            }
        }

        function closeMenu() {
            if (mobileMenu) {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = 'auto'; // スクロールを復元
                isMenuOpen = false;
            }
        }

        if (hamburgerButton) {
            hamburgerButton.addEventListener('click', openMenu);
        }

        if (closeMenuButton) {
            closeMenuButton.addEventListener('click', closeMenu);
        }

        // メニュー外をクリックしたときも閉じる
        if (mobileMenu) {
            mobileMenu.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    closeMenu();
                }
            });
        }

        // --- ▼▼▼【ここから追記】ヘッダー表示切替のスクリプト ▼▼▼ ---
        const header = document.getElementById('main-header');
        if (header) {
            let lastScrollY = window.scrollY;
            const headerHeight = header.offsetHeight; // ヘッダーの高さを取得

            window.addEventListener('scroll', () => {
                // メニューが開いている場合はヘッダーの自動隠し機能を無効化
                if (isMenuOpen) {
                    return;
                }

                const currentScrollY = window.scrollY;

                if (currentScrollY > lastScrollY && currentScrollY > headerHeight) {
                    // 下にスクロールした場合
                    header.classList.add('-translate-y-full');
                } else {
                    // 上にスクロールした場合
                    header.classList.remove('-translate-y-full');
                }
                lastScrollY = currentScrollY;
            });
        }

        // ESCキーでメニューを閉じる
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMenu();
            }
        });
    });
</script>