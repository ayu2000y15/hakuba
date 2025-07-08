{{-- idを追加し、fixedやtransitionなどのクラスを設定 --}}
<header id="main-header"
    class="fixed top-0 left-0 right-0 z-40 bg-white py-4 shadow-sm transition-transform duration-300 ease-in-out">
    <div class="container mx-auto px-4 flex justify-between items-center">
        {{-- 左側: ロゴ --}}
        <div class="flex-shrink-0">
            <a href="/" aria-label="トップページへ">
                <div class="flex items-center">
                    <img src="{{ asset($logo1->file_path . $logo1->file_name) }}" alt="ロゴ" class="h-10">
                    <img src="{{ asset($logo2->file_path . $logo2->file_name) }}" alt="薬局はくば" class="h-10 ml-2">
                </div>
            </a>
        </div>

        {{-- 中央: PC用ナビゲーションメニュー --}}
        <nav class="hidden md:flex space-x-6">
            @foreach ($menuItem as $item)
                <a href="{{ route($item->spare1) }}" class="py-2">
                    <img src="{{ asset($item->file_path . $item->file_name) }}" alt="{{-- 適切なaltテキスト --}}"
                        class="h-6 hover:opacity-80 transition-opacity">
                </a>
            @endforeach
        </nav>

        {{-- 右側: PC用 採用案内ボタン --}}
        <div class="hidden md:block">
            <a href="{{ route($menuButton->spare1) }}" class="inline-block">
                <img src="{{ asset($menuButton->file_path . $menuButton->file_name) }}" alt="採用案内"
                    class="h-12 hover:opacity-80 transition-opacity">
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
        <div class="relative mb-10">
            <div class="flex justify-center items-center">
                <img src="{{ asset($logo1->file_path . $logo1->file_name) }}" alt="ロゴ" class="h-10">
                <img src="{{ asset($logo2->file_path . $logo2->file_name) }}" alt="薬局はくば" class="h-10 ml-2">
            </div>
            <div class="flex justify-center items-center">
                <img src="{{ asset($menuTitle->file_path . $menuTitle->file_name) }}" alt="タイトル" class="h-9 mt-12 ">
            </div>
            <button id="close-menu-button" class="absolute top-1/2 right-0 -translate-y-1/2" aria-label="メニューを閉じる">
                <svg class="h-8 w-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex flex-col">
            <nav class="w-full flex flex-col items-start space-y-4">
                @foreach ($menuItem as $item)
                    <a href="{{ route($item->spare1) }}" class="py-2">
                        <img src="{{ asset($item->file_path . $item->file_name) }}" alt="{{-- 適切なaltテキスト --}}"
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

        if (hamburgerButton) {
            hamburgerButton.addEventListener('click', () => {
                if (mobileMenu) {
                    mobileMenu.classList.remove('hidden');
                }
            });
        }

        if (closeMenuButton) {
            closeMenuButton.addEventListener('click', () => {
                if (mobileMenu) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // --- ▼▼▼【ここから追記】ヘッダー表示切替のスクリプト ▼▼▼ ---
        const header = document.getElementById('main-header');
        if (header) {
            let lastScrollY = window.scrollY;
            const headerHeight = header.offsetHeight; // ヘッダーの高さを取得

            window.addEventListener('scroll', () => {
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
    });
</script>