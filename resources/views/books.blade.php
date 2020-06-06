<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')

<div class="card-body">
    <!-- バリデーションエラーの表示に使用-->
    @include('common/errors')
    <!-- バリデーションエラーの表示に使用-->

    <!-- 本登録フォーム -->
    <form action="{{ url('books') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">表題</label>
            <div class="col">
                <input type="text" name="item_name" id="book-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">個数</label>
            <div class="col">
                <input type="text" name="item_number" id="book-number" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">金額</label>
            <div class="col">
                <input type="text" name="item_amount" id="book-amount" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-3 control-label">公開日</label>
            <div class="col">
                <input type="date" name="published" id="published" class="form-control">
            </div>
        </div>

        <!-- 本 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                <button type="submit" class="btn btn-lg btn-default btn-primary btn-block">
                    <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                    </svg>
                    登録
                </button>
            </div>
        </div>
    </form>


    <!-- 現在 本 -->
    @if (count($books) > 0)
    <div class="card">
        <div class="card-header">
            現在 本
        </div>
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>本一覧</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text">
                            <div>{{ $book->item_name }}</div>
                        </td>

                        <!-- 本: 編集ボタン -->
                        <td>
                            <form action="{{ url('edit/'.$book->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">
                                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                                    </svg> 編集
                                </button>
                            </form>
                        </td>
                        <!-- 本: 削除ボタン -->
                        <td>
                            <form action="{{ url('book/'.$book->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                    </svg> 削除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection