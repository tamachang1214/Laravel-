<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>会社登録</h2>
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
                <form action="/company/store" method="post">
            @elseif($target === 'update')
                <form action="/company/update/{{ $company->id }}" method="post">
            @endif

                @csrf

                {{-- 会社名 --}}
                <div class="form-group">
                    <label for="name">会社名</label>
                    <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                </div>

                {{-- 設立年 --}}
                <div class="form-group">
                    <label for="established_year">設立年月日</label>
                    <input type="text" class="form-control" name="established_year" value="{{ $company->established_year }}">
                </div>

                {{-- 住所 --}}
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" class="form-control" name="address" value="{{ $company->address }}">
                </div>

                {{-- 電話番号 --}}
                <div class="form-group">
                    <label for="phone_number">電話番号</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ $company->phone_number }}">
                </div>
                
                {{-- 公式サイト --}}
                <div class="form-group">
                    <label for="website">URL</label>
                    <input type="text" class="form-control" name="website" value="{{ $company->website }}">
                </div>

                {{-- 送信 --}}
                <button type="submit" class="btn btn-success">登録</button>
                <a href="/company" class="btn btn-default">戻る</a>

            </form>

        </div>
    </div>
</div>
