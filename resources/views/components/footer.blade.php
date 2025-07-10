<footer class="bg-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-8 md:space-y-0">

            <div class="flex items-center justify-center md:justify-start order-1 md:order-none">
                <img src="{{ asset($logo1->file_path . $logo1->file_name) }}" alt="ロゴ" class="h-10">
                <img src="{{ asset($logo2->file_path . $logo2->file_name) }}" alt="薬局はくば" class="h-10 ml-2">
            </div>

            <div class="w-full md:w-auto order-3 md:order-none">
                <div class="flex flex-col items-start md:flex-row md:items-center md:space-x-8 px-4 mt-4 md:px-0">
                    @foreach ($menuItem as $item)
                        {{-- リンク本体 --}}
                        <a href="{{ route($item->spare1) }}" class="py-2 md:py-0">
                            <img src="{{ asset($item->file_path . $item->file_name) }}" alt="{{ $item->comment }}"
                                class="h-6 hover:opacity-80 transition-opacity">
                        </a>

                        {{-- スマホ専用の区切り線 --}}
                        @if (!$loop->last)
                            <div class="border-b border-orange-300 w-full my-2 md:hidden"></div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center md:justify-end order-2 md:order-none">
                <a href="{{ route($menuButton->spare1) }}" class="inline-block">
                    <img src="{{ asset($menuButton->file_path . $menuButton->file_name) }}" alt="採用案内"
                        class="h-12 hover:opacity-80 transition-opacity">
                </a>
            </div>

        </div>
    </div>
</footer>