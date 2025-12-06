<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>書籍登録</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            {{-- ★ エラーメッセージ表示（後で使います） --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ★ 新規登録か編集かで分岐 --}}
            @if($target === 'store')
                <form action="/book/store" method="post">
            @elseif($target === 'update')
                <form action="/book/update/{{ $book->id }}" method="post">
            @endif

                @csrf

                {{-- 書籍名 --}}
                <div class="form-group">
                    <label for="name">書籍名</label>
                    <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                </div>

                {{-- 価格 --}}
                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" class="form-control" name="price" value="{{ $book->price }}">
                </div>

                {{-- 著者 --}}
                <div class="form-group">
                    <label for="author">著者</label>
                    <input type="text" class="form-control" name="author" value="{{ $book->author }}">
                </div>

                {{-- 送信 --}}
                <button type="submit" class="btn btn-success">登録</button>
                <a href="/book">戻る</a>

            </form>

        </div>
    </div>
</div>
