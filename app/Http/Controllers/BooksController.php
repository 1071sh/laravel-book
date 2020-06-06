<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use Validator;

class BooksController extends Controller
{
    //登録
    public function index()
    {
        $books = Book::orderBy('created_at', 'asc')->paginate(5);
        return view('books', [
                'books' => $books
            ]);
    }


    //登録
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
        'item_name' => 'required|max:255',
        'item_number' => 'required | min:1 | max:3',
        'item_amount' => 'required | max:6',
        'published'   => 'required',
]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }
        // Eloquent モデル
        $books = new Book;
        $books->item_name =    $request->item_name;
        $books->item_number =  $request->item_number;
        $books->item_amount =  $request->item_amount;
        $books->published =    $request->published;
        $books->save();   //「/」ルートにリダイレクト
        return redirect('/');
    }


    public function update(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published' => 'required',
    ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //データ更新
        $books = Book::find($request->id);
        $books->item_name   = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published   = $request->published;
        $books->save();
        return redirect('/');
    }


    //登録
    public function delete(Book $book)
    {
        $book->delete();
        return redirect('/');
    }


    public function edit(Book $books)
    {
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        return view('edit', ['book' => $books]);
    }
}
