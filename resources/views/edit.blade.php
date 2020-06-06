<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap の定形コード... -->

<div class="card-body">
    <!-- バリデーションエラーの表示に使用-->
    @include('common/errors')
    <!-- バリデーションエラーの表示に使用-->

    <!-- 本登録フォーム -->
    <form action="{{ url("books/update") }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- 本のタイトル -->
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">表題</label>
            <div class="col-sm-6">
                <input type="text" name="item_name" id="book-name" class="form-control" value="{{ $book->item_name }}">
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">個数</label>
            <div class="col-sm-6">
                <input type="text" name="item_number" id="book-number" class="form-control" value="{{ $book->item_number }}">
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">金額</label>
            <div class="col-sm-6">
                <input type="text" name="item_amount" id="book-amount" class="form-control" value="{{ $book->item_amount }}">
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">公開日</label>
            <div class="col-sm-6">
                <input type="datetime" name="published" id="published" class="form-control" value="{{ $book->published }}">
            </div>
        </div>

        <!-- 本 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <svg class="bi bi-arrow-clockwise" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.17 6.706a5 5 0 0 1 7.103-3.16.5.5 0 1 0 .454-.892A6 6 0 1 0 13.455 5.5a.5.5 0 0 0-.91.417 5 5 0 1 1-9.375.789z" />
                        <path fill-rule="evenodd" d="M8.147.146a.5.5 0 0 1 .707 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 1 1-.707-.708L10.293 3 8.147.854a.5.5 0 0 1 0-.708z" />
                    </svg> 更新
                </button>
                <a class="btn btn-link float-right" href="{{ url('/') }}">
                    <svg class="bi bi-skip-backward-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V4a.5.5 0 0 0-.5-.5z" />
                        <path d="M.904 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.692-1.01-1.233-.696L.904 7.304a.802.802 0 0 0 0 1.393z" />
                        <path d="M8.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L8.404 7.304a.802.802 0 0 0 0 1.393z" />
                    </svg> 戻る
                </a>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $book->id }}">
    </form>
</div>
@endsection