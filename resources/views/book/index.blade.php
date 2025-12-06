<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍一覧</title>

    {{-- Bootstrap（見た目を少し整えるためのCSS） --}}
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">書籍一覧</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 col-md-offset-1">

            {{-- 書籍一覧テーブル --}}
            <table class="table text-center">

                {{-- テーブルのヘッダー行 --}}
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">書籍名</th>
                    <th class="text-center">価格</th>
                    <th class="text-center">著者</th>
                </tr>

                {{-- ★ コントローラから渡された $books を1行ずつ表示 --}}
                {{-- ★ $books は Book::all() の結果（全レコード） --}}
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->author }}</td>

                    {{-- ★ 編集ボタン --}}
                    <td>
                        <a href="/book/edit/{{ $book->id }}" class="btn btn-primary btn-sm">
                            編集
                        </a>
                    </td>
                    {{-- ★ 削除ボタン --}}
                    <td>
                        <form action="/book/delete/{{ $book->id }}" method="post" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>

            <div style="margin-top: 20px;">
                <a href="/book/create" class="btn btn-success">
                    新規作成
                </a>
            </div>


        </div>
    </div>

</div>
</body>
</html>
