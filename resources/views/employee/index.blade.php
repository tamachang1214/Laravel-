@extends('layouts.app')

@section('title', '社員一覧')

@section('content')

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

                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">名前</th>
                    <th class="text-center">苗字</th>
                    <th class="text-center">会社名</th>
                    <th class="text-center">生年月日</th>
                    <th class="text-center">メール</th>
                    <th class="text-center">部署</th>
                    <th class="text-center">編集</th>
                    <th class="text-center">削除</th>
                </tr>

                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company->name ?? '未設定' }}</td>

                    <td>{{ $employee->birth }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>

                    <td>
                        <a href="/employee/edit/{{ $employee->id }}" class="btn btn-primary btn-sm">
                            編集
                        </a>
                    </td>

                    <td>
                        <form action="/employee/delete/{{ $employee->id }}" method="post" style="display:inline;"
                            onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>

        <div style="margin-top: 30px;">
            <div style="display: inline-block; margin-right: 10px;">
                <a href="/employee/create" class="btn btn-success">
                    新規作成
                </a>
            </div>

            <div style="display: inline-block;">
                <a href="/company" class="btn btn-secondary">
                    会社一覧へ戻る
                </a>
            </div>
        </div>

        </div>
    </div>
</div>

@endsection
