@extends('layouts.admin')

@section('title', 'HPテキスト管理')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center page-title mb-4">
            <h2>HPテキスト管理</h2>
            @if (session('access_id') == '0')
                <button type="button" class="btn btn-primary" id="newEntryBtn">
                    <i class="fas fa-plus me-1"></i> 新規登録
                </button>
            @else
                <button style="display: none;" type="button" class="btn btn-primary" id="newEntryBtn">
                    <i class="fas fa-plus me-1"></i> 新規登録
                </button>
            @endif
        </div>

        <!-- 登録・更新フォーム -->
        <div class="card mb-4" id="dataForm" style="display: none;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">登録・更新</h5>
                <button type="button" class="btn-close" id="cancelBtn" aria-label="閉じる"></button>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hptext.store') }}" method="POST" class="data-form">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="text_id" class="form-label">ID<span class="text-danger ms-1">*</span></label>
                            <input type="text" id="text_id" name="hp_text_id" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="memo" class="form-label">タイトル、メモ<span class="text-danger ms-1"></span></label>
                            <input type="text" id="memo" name="memo" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">内容<span class="text-danger ms-1">*</span></label>
                        <textarea id="content" name="content" class="form-control" rows="10" required></textarea>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" onclick="return confirm('登録しますか？');" class="btn btn-primary"
                            id="submitBtn">登録</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- データ一覧 -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">登録済みデータ一覧</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 150px;">操作</th>
                                <th>ID</th>
                                <th>タイトル、メモ</th>
                                <th>内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hpText as $def)
                                <tr>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-warning edit-btn" data-id="{{ $def->t_id }}"
                                                data-raw-content="{{ $def->content }}" data-memo="{{ $def->memo }}">
                                                <i class="fas fa-edit"></i> 編集
                                            </button>
                                            <form action="{{ route('admin.hptext.delete') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="hp_text_id" value="{{ $def->t_id }}">
                                                @if (session('access_id') == '0')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('本当に削除しますか？');">
                                                        <i class="fas fa-trash"></i> 削除
                                                    </button>
                                                @else
                                                    <button style="display:none;" type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('本当に削除しますか？');">
                                                        <i class="fas fa-trash"></i> 削除
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
                                    <td>{{ $def->t_id }}</td>
                                    <td>{{ $def->memo }}</td>
                                    <td>
                                        <div class="text-content">
                                            {!! nl2br($def->content) !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            const form = document.querySelector('.data-form');
            const dataFormContainer = document.getElementById('dataForm');
            const newEntryBtn = document.getElementById('newEntryBtn');
            const submitBtn = document.getElementById('submitBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const contentTextarea = document.getElementById('content');

            //キャンセルボタンのイベントリスナー
            cancelBtn.addEventListener('click', function () {
                hideForm();
            });

            // 新規登録ボタンのイベントリスナー
            newEntryBtn.addEventListener('click', function () {
                resetForm();
                showForm();
            });

            // 編集ボタンのイベントリスナー
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const textId = this.getAttribute('data-id');
                    const rawContent = this.getAttribute('data-raw-content');
                    const memo = this.getAttribute('data-memo');

                    const textIdField = document.getElementById('text_id');
                    textIdField.value = textId;
                    textIdField.readOnly = true;
                    textIdField.classList.add('bg-light');

                    document.getElementById('memo').value = memo;

                    // テキストエリアに内容を反映
                    contentTextarea.value = rawContent;

                    submitBtn.textContent = '更新';
                    form.action = "{{ route('admin.hptext.update') }}";

                    showForm();
                });
            });

            function resetForm() {
                form.reset();
                const textIdField = document.getElementById('text_id');
                textIdField.value = '';
                textIdField.readOnly = false;
                textIdField.classList.remove('bg-light');

                contentTextarea.value = '';
                document.getElementById('memo').value = '';

                submitBtn.innerHTML = '<i class="fas fa-save me-1"></i> 登録';
                form.action = "{{ route('admin.hptext.store') }}";
            }

            function showForm() {
                dataFormContainer.style.display = 'block';
                dataFormContainer.scrollIntoView({ behavior: 'smooth' });
            }

            function hideForm() {
                dataFormContainer.style.display = 'none';
            }
        });
    </script>

    <style>
        .text-content {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            max-width: 500px;
            overflow-wrap: break-word;
        }

        .card-body {
            background-color: #faf9f6 !important;
        }
    </style>
@endsection