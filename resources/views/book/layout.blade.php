<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Laravel Sample</title>

    {{-- Bootstrap（画面の装飾用） --}}
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

{{-- ここに子ビューの内容が差し込まれる --}}
@yield('content')

</body>
</html>
