<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>社員登録</h2>
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
                <form action="/employee/store" method="post">
            @elseif($target === 'update')
                <form action="/employee/update/{{ $employee->id }}" method="post">
            @endif

                @csrf

                {{-- 社員名 --}}
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
                </div>

                {{-- 社員苗字 --}}
                <div class="form-group">
                    <label for="name">苗字</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
                </div>

                {{-- 会社ID --}}
                <div class="form-group">
                    <label for="company_id">会社ID</label>
                    <input type="text" class="form-control" name="company_id" value="{{ $employee->company_id }}">
                </div>

                {{-- 生年月日 --}}
                <div class="form-group">
                    <label for="birth">生年月日</label>

                    <div style="display: flex; gap: 10px;">

                        <input type="number" class="form-control" name="birth_year"
                            placeholder="YYYY" style="width: 100px;"
                            value="{{ old('birth_year', $employee->birth ? date('Y', strtotime($employee->birth)) : '') }}">

                        <input type="number" class="form-control" name="birth_month"
                            placeholder="MM" style="width: 60px;"
                            value="{{ old('birth_month', $employee->birth ? date('m', strtotime($employee->birth)) : '') }}">

                        <input type="number" class="form-control" name="birth_day"
                            placeholder="DD" style="width: 60px;"
                            value="{{ old('birth_day', $employee->birth ? date('d', strtotime($employee->birth)) : '') }}">
                    </div>
                </div>

                {{-- メールアドレス --}}
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
                </div>

                {{-- 部署 --}}
                <div class="form-group">
                    <label for="department">部署</label>
                    <input type="text" class="form-control" name="department" value="{{ $employee->department }}">
                </div>

                {{-- 送信 --}}
                <button type="submit" class="btn btn-success">登録</button>

                <a href="/employee" class="btn btn-default">戻る</a>

            </form>

        </div>
    </div>
</div>
