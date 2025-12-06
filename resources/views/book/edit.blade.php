<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍編集</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div class="container">
    <h3>書籍編集</h3>

    {{-- ★ 編集フォーム（update に送信する） --}}
    <form action="/book/update/{{ $book->id }}" method="post">

        {{-- ★ Laravel の CSRF 対策トークン --}}
        @csrf

        {{-- 書籍名 --}}
        <div class="form-group">
            <label>書籍名</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $book->name }}">
        </div>

        {{-- 価格 --}}
        <div class="form-group">
            <label>価格</label>
            <input type="number" name="price" class="form-control"
                   value="{{ $book->price }}">
        </div>

        {{-- 著者 --}}
        <div class="form-group">
            <label>著者</label>
            <input type="text" name="author" class="form-control"
                   value="{{ $book->author }}">
        </div>

        <button type="submit" class="btn btn-primary">
            更新する
        </button>
    </form>
</div>

</body>
</html>
