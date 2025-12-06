code <div class=""></div>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">社員一覧</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 col-md-offset-1">

            {{-- 社員一覧テーブル --}}
            <table class="table text-center">

                {{-- テーブルのヘッダー行 --}}
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">名前</th>
                    <th class="text-center">苗字</th>
                    <th class="text-center">会社ID</th>
                    <th class="text-center">生年月日</th>
                    <th class="text-center">メール</th>
                    <th class="text-center">部署</th>
                    <th class="text-center">編集</th>
                    <th class="text-center">削除</th>
                </tr>

                {{-- ★ コントローラから渡された $employees を1行ずつ表示 --}}
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company_id }}</td>
                    <td>{{ $employee->birth }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>

                    {{-- 編集ボタン --}}
                    <td>
                        <a href="/employee/edit/{{ $employee->id }}" class="btn btn-primary btn-sm">
                            編集
                        </a>
                    </td>

                    {{-- 削除ボタン --}}
                    <td>
                        <form action="/employee/delete/{{ $employee->id }}" method="post" style="display:inline;">
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
                <a href="/employee/create" class="btn btn-success">
                    新規作成
                </a>
            </div>

        </div>
    </div>

</div>

@endsection
