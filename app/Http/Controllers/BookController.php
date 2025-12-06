<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        // ★ Laravel の自動機能
        // Bookモデル → booksテーブルに自動で紐づく
        // そのため Book::all() で全レコード取得できる
        $books = Book::all();

        // ★ Bladeファイル（book/index.blade.php）にデータを渡す
        // compact('books') = ['books' => $books] と同じ意味
        return view('book.index', compact('books'));
    }

    public function edit($id)
    {
        // ★ $id の本を 1 件だけ取得
        // find($id) は SELECT * FROM books WHERE id = ? LIMIT 1 の意味
        $book = Book::find($id);

        // ★ 見つからない場合の対策（優しいエラーハンドリング）
        if (!$book) {
            abort(404, 'Book not found');
        }

        // ★ 編集画面へ表示するために $book を渡す
        return view('book.edit', compact('book'));
    }

    public function update(BookRequest $request, $id)
    {
        // ★ 1件取得（更新する本）
        $book = Book::find($id);

        if (!$book) {
            abort(404, 'Book not found');
        }

        // ★ 入力値をモデルに反映
        // $request はフォームの入力データが全部入ったオブジェクト
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;

        // ★ DB に保存（UPDATE）
        $book->save();

        // ★ 更新後に一覧へ戻る
        return redirect('/book');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            abort(404, 'Book not found');
        }

        $book->delete();  // ← これだけで SQL DELETE が発行される

        return redirect('/book');
    }

    public function create()
    {
        // 空のモデルをビューに渡す
        $book = new Book();

        return view('book.create', compact('book'));
    }

    public function store(BookRequest $request)
    {
        // 新しいBookを作成
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;

        $book->save(); // ← DBにINSERT

        return redirect('/book');
    }

}

