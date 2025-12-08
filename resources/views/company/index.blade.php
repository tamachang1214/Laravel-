@extends('layouts.app')

@section('title', '会社一覧')

@section('content')

<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>会社一覧</h2>
        </div>
    </div>

    <table class="table table-striped">
        {{-- ここから下に会社一覧のテーブルを書きます --}}
        
        <tr>
            <th>ID</th>
            <th>会社名</th>
            <th>設立年</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>Webサイト</th>
            <th>社員一覧</th>
            <th>社員登録</th>
            <th>編集</th>
            <th>削除</th>
        </tr>

        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->established_year }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->phone_number }}</td>
                <td>{{ $company->website }}</td>

                {{-- ★ 社員一覧ボタン --}}
                <td>
                    <a href="/company/{{ $company->id }}/employees" class="btn btn-warning btn-sm">
                        社員一覧
                    </a>
                </td>
                
                {{-- ★ 社員登録ボタン --}}
                <td>
                    <a href="/employee/create?company_id={{ $company->id }}" class="btn btn-info btn-sm">
                        社員登録
                    </a>
                </td>

                {{-- ★ 編集ボタン --}}
                <td>
                    <a href="/company/edit/{{ $company->id }}" class="btn btn-primary btn-sm">
                        編集
                    </a>
                </td>

                {{-- ★ 削除ボタン --}}
                <td>
                    <form action="/company/delete/{{ $company->id }}" method="post" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div style="margin-top: 20px;">
        <a href="/company/create" class="btn btn-success">
            新規会社登録
        </a>
    </div>

</div>

@endsection
