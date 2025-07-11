@extends('layouts.admin')

@section('title', $master->title . ' - データ一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/rich-text-content.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center page-title mb-4">
        <h2>{{ $master->title }} - データ一覧</h2>
        <div>
            <a href="{{ route('admin.content-data') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left"></i> 戻る
            </a>
            <a href="{{ route('admin.content-data.create', ['masterId' => $master->master_id]) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> 新規登録
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold"><i class="fas fa-table me-2"></i>データ一覧</h5>
        </div>
        <div class="card-body">
            @if(count($data) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 150px;">操作</th>
                                <th style="width: 80px;">表示順</th>
                                @if(isset($master->schema) && is_array($master->schema))
                                    @php
                                        // スキーマを表示順でソート
                                        $sortedSchema = collect($master->schema)->sortBy('sort_order')->values()->all();
                                    @endphp
                                    @foreach($sortedSchema as $field)
                                        @if($field['public_flg'] == '1')
                                            <th>{{ $field['view_name'] }}</th>
                                        @endif
                                    @endforeach
                                @endif
                                <th>公開状態</th>
                                <th>登録日時</th>
                                <th>更新日時</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-items">
                            @foreach($data as $item)
                                <tr data-id="{{ $item->data_id }}">
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.content-data.edit', ['dataId' => $item->data_id]) }}"
                                                class="btn btn-sm btn-warning btn-action">
                                                <i class="fas fa-edit"></i> 編集
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->data_id }}">
                                                <i class="fas fa-trash"></i> 削除
                                            </button>
                                        </div>

                                        <!-- 削除確認モーダル -->
                                        <div class="modal fade" id="deleteModal{{ $item->data_id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">削除確認</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="閉じる"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>このデータを削除してもよろしいですか？</p>
                                                        <p>この操作は取り消せません。</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">キャンセル</button>
                                                        <form
                                                            action="{{ route('admin.content-data.delete', ['dataId' => $item->data_id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">削除する</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="sort-handle me-2"><i class="fas fa-grip-vertical text-muted"></i></span>
                                            <span class="sort-order badge bg-secondary">{{ $item->sort_order ?? 0 }}</span>
                                            <input type="hidden" name="sort_order" value="{{ $item->sort_order ?? 0 }}">
                                        </div>
                                    </td>
                                    @if(isset($master->schema) && is_array($master->schema))
                                        @foreach($sortedSchema as $field)
                                            @if($field['public_flg'] == '1')
                                                <td>
                                                    @if(isset($item->content[$field['col_name']]))
                                                        @if($field['type'] == 'textarea')
                                                            <div class="text-content" style="max-height: 100px; overflow-y: auto;">
                                                                {!! nl2br(e($item->content[$field['col_name']])) !!}
                                                            </div>
                                                        @elseif($field['type'] == 'richtext')
                                                            @if(!empty($item->content[$field['col_name']]))
                                                                <button type="button" class="btn btn-sm btn-outline-primary richtext-preview-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#richtextPreviewModal"
                                                                        data-content="{{ base64_encode($item->content[$field['col_name']]) }}"
                                                                        data-title="{{ $field['view_name'] }}">
                                                                    <i class="fas fa-eye"></i> プレビュー
                                                                </button>
                                                            @else
                                                                <span class="text-muted">内容なし</span>
                                                            @endif
                                                        @elseif($field['type'] == 'file')
                                                            @if(!empty($item->content[$field['col_name']]))
                                                                <a href="{{ asset($item->content[$field['col_name']]) }}" target="_blank"
                                                                    class="image-preview">
                                                                    <img src="{{ asset($item->content[$field['col_name']]) }}" alt="画像"
                                                                        class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                                                </a>
                                                            @else
                                                                <span class="text-muted">ファイルなし</span>
                                                            @endif
                                                        @elseif($field['type'] == 'array')
                                                            @if(!empty($item->content[$field['col_name']]) && is_array($item->content[$field['col_name']]))
                                                                <div class="array-data-preview">
                                                                    <button type="button" class="btn btn-sm btn-outline-info array-preview-toggle"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#array-preview-{{ $item->data_id }}-{{ $field['col_name'] }}">
                                                                        {{ count($item->content[$field['col_name']]) }}個の項目 <i class="fas fa-chevron-down"></i>
                                                                    </button>
                                                                    <div class="collapse mt-2" id="array-preview-{{ $item->data_id }}-{{ $field['col_name'] }}">
                                                                        <div class="card card-body p-2">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-sm table-bordered mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            @if(isset($field['array_items']) && is_array($field['array_items']))
                                                                                                @foreach($field['array_items'] as $arrayItem)
                                                                                                    <th>{{ $arrayItem['name'] }}</th>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach($item->content[$field['col_name']] as $index => $arrayItem)
                                                                                            <tr>
                                                                                                <td>{{ $index + 1 }}</td>
                                                                                                @if(isset($field['array_items']) && is_array($field['array_items']))
                                                                                                    @foreach($field['array_items'] as $arrayItemDef)
                                                                                                        <td>
                                                                                                            @if(isset($arrayItem[$arrayItemDef['name']]))
                                                                                                                @if($arrayItemDef['type'] == 'boolean')
                                                                                                                    <span class="badge {{ $arrayItem[$arrayItemDef['name']] ? 'bg-success' : 'bg-secondary' }}">
                                                                                                                        {{ $arrayItem[$arrayItemDef['name']] ? '有効' : '無効' }}
                                                                                                                    </span>
                                                                                                                @elseif($arrayItemDef['type'] == 'date')
                                                                                                                    {{ $arrayItem[$arrayItemDef['name']] }}
                                                                                                                @elseif($arrayItemDef['type'] == 'url')
                                                                                                                    <a href="{{ $arrayItem[$arrayItemDef['name']] }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 200px;">
                                                                                                                        {{ $arrayItem[$arrayItemDef['name']] }}
                                                                                                                    </a>
                                                                                                                @else
                                                                                                                    {{ $arrayItem[$arrayItemDef['name']] }}
                                                                                                                @endif
                                                                                                            @endif
                                                                                                        </td>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <span class="text-muted">データなし</span>
                                                            @endif
                                                        @elseif($field['type'] == 'files')
                                                            @if(!empty($item->content[$field['col_name']]) && is_array($item->content[$field['col_name']]))
                                                                <div class="d-flex flex-wrap gap-1">
                                                                    @foreach($item->content[$field['col_name']] as $filePath)
                                                                        <a href="{{ asset($filePath) }}" target="_blank" class="image-preview">
                                                                            <img src="{{ asset($filePath) }}" alt="画像" class="img-thumbnail"
                                                                                style="width: 50px; height: 50px; object-fit: cover;">
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <span class="text-muted">ファイルなし</span>
                                                            @endif
                                                        @else
                                                            <span class="data-value">{{ $item->content[$field['col_name']] }}</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif
                                    <td>
                                        <span class="badge {{ $item->public_flg == '1' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $item->public_flg == '1' ? '公開' : '非公開' }}
                                        </span>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- 表示順保存ボタン -->
                <div class="mt-3">
                    <form id="sort-form"
                        action="{{ route('admin.content-data.update-order', ['masterId' => $master->master_id]) }}"
                        method="POST">
                        @csrf
                        <input type="hidden" id="sort-data" name="sort_data" value="">
                        <button type="submit" class="btn btn-success" id="save-sort-btn">
                            <i class="fas fa-save"></i> 表示順を保存
                        </button>
                    </form>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>データがありません。新規登録ボタンからデータを追加してください。
                </div>
            @endif
        </div>
    </div>

    <!-- 画像プレビューモーダル -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">画像プレビュー</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="/placeholder.svg" id="previewImage" class="img-fluid" alt="プレビュー">
                </div>
            </div>
        </div>
    </div>

    <!-- リッチテキストプレビューモーダル -->
    <div class="modal fade" id="richtextPreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="richtextPreviewTitle">リッチテキストプレビュー</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                    <div id="richtextPreviewContent" class="richtext-preview-content initiative-content">
                        <!-- リッチテキストの内容がここに表示されます -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* データ一覧のスタイル改善 */
        .table-primary th {
            font-weight: 600;
        }

        .data-value {
            font-weight: 500;
        }

        .text-content {
            background-color: #f8f9fa;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }

        .array-preview-toggle {
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
        }

        .sort-handle {
            cursor: grab;
        }

        .sort-handle:active {
            cursor: grabbing;
        }

        /* 画像プレビューのスタイル */
        .image-preview img {
            transition: transform 0.2s;
            border: 2px solid transparent;
        }

        .image-preview:hover img {
            transform: scale(1.05);
            border-color: #0d6efd;
        }

        /* リッチテキストプレビューのスタイル */
        .richtext-preview-btn {
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
        }

        .richtext-preview-content {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            min-height: 200px;
            max-height: 70vh;
            overflow-y: auto;
            overflow-x: hidden; /* 横スクロールを防ぐ */
            font-family: "Kiwi Maru", serif; /* フォールバックとしてserifを指定 */
            line-height: 1.6;
            word-wrap: break-word; /* 長い単語を改行 */
            color: #166534; /* text-green-800 */
        }

        /* プレビュー内の画像とテーブルの横スクロール対策 */
        .richtext-preview-content * {
            max-width: 100% !important;
            box-sizing: border-box;
        }

        /* プレビュー内のリンクとテーブル行の文字色統一 */
        .richtext-preview-content a {
            color: #166534 !important; /* text-green-800 */
        }

        .richtext-preview-content table tbody tr,
        .richtext-preview-content table tbody td {
            color: #166534 !important; /* text-green-800 */
        }

        .richtext-preview-content table {
            table-layout: auto !important;
            overflow-x: auto;
            display: block;
            white-space: nowrap;
        }

        .richtext-preview-content table thead,
        .richtext-preview-content table tbody {
            display: table;
            width: 100%;
        }

        @media (max-width: 768px) {
            .richtext-preview-content table {
                font-size: 0.875rem;
            }

            .richtext-preview-content table th,
            .richtext-preview-content table td {
                padding: 8px 12px;
            }
        }
    </style>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 画像プレビュー機能
            const imageLinks = document.querySelectorAll('.image-preview');
            const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            const previewImage = document.getElementById('previewImage');

            imageLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    previewImage.src = this.href;
                    previewModal.show();
                });
            });

            // リッチテキストプレビュー機能
            const richtextPreviewBtns = document.querySelectorAll('.richtext-preview-btn');
            const richtextPreviewModal = new bootstrap.Modal(document.getElementById('richtextPreviewModal'));
            const richtextPreviewTitle = document.getElementById('richtextPreviewTitle');
            const richtextPreviewContent = document.getElementById('richtextPreviewContent');

            richtextPreviewBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();

                    const title = this.dataset.title;
                    const encodedContent = this.dataset.content;

                    try {
                        // Base64デコード（UTF-8対応 - 方法1: TextDecoder使用）
                        const binaryString = atob(encodedContent);
                        const bytes = new Uint8Array(binaryString.length);
                        for (let i = 0; i < binaryString.length; i++) {
                            bytes[i] = binaryString.charCodeAt(i);
                        }
                        const decoder = new TextDecoder('utf-8');
                        const decodedContent = decoder.decode(bytes);

                        // モーダルタイトルとコンテンツを設定
                        richtextPreviewTitle.textContent = title + ' - プレビュー';
                        richtextPreviewContent.innerHTML = decodedContent;

                        // モーダルを表示
                        richtextPreviewModal.show();
                    } catch (error) {
                        console.error('TextDecoderでのデコードに失敗しました:', error);

                        // フォールバック1: decodeURIComponent + atob
                        try {
                            const decodedContent = decodeURIComponent(atob(encodedContent).split('').map(function(c) {
                                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                            }).join(''));

                            richtextPreviewTitle.textContent = title + ' - プレビュー';
                            richtextPreviewContent.innerHTML = decodedContent;
                            richtextPreviewModal.show();
                        } catch (fallbackError1) {
                            console.error('decodeURIComponentでのデコードに失敗しました:', fallbackError1);

                            // フォールバック2: 直接atob
                            try {
                                const fallbackContent = atob(encodedContent);
                                richtextPreviewTitle.textContent = title + ' - プレビュー';
                                richtextPreviewContent.innerHTML = fallbackContent;
                                richtextPreviewModal.show();
                            } catch (fallbackError2) {
                                console.error('すべてのデコード方法が失敗しました:', fallbackError2);
                                richtextPreviewContent.innerHTML = '<p class="text-danger">コンテンツの表示に失敗しました。文字エンコーディングの問題の可能性があります。</p>';
                                richtextPreviewModal.show();
                            }
                        }
                    }
                });
            });

            // ドラッグ&ドロップでの並べ替え
            const sortableList = document.getElementById('sortable-items');
            if (sortableList) {
                new Sortable(sortableList, {
                    handle: '.sort-handle',
                    animation: 150,
                    onEnd: function () {
                        updateSortOrder();
                    }
                });

                // 表示順の更新
                function updateSortOrder() {
                    const items = sortableList.querySelectorAll('tr');
                    items.forEach((item, index) => {
                        const orderSpan = item.querySelector('.sort-order');
                        const orderInput = item.querySelector('input[name="sort_order"]');
                        if (orderSpan && orderInput) {
                            orderSpan.textContent = index + 1;
                            orderInput.value = index + 1;
                        }
                    });
                }

                // 表示順保存
                const sortForm = document.getElementById('sort-form');
                const sortDataInput = document.getElementById('sort-data');

                sortForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const items = sortableList.querySelectorAll('tr');
                    const sortData = [];

                    items.forEach((item) => {
                        const id = item.dataset.id;
                        const order = item.querySelector('input[name="sort_order"]').value;
                        sortData.push({ id: id, order: order });
                    });

                    sortDataInput.value = JSON.stringify(sortData);
                    this.submit();
                });
            }
        });
    </script>
@endpush

