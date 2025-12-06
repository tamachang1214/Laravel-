<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Sample')</title>

    {{-- Bootstrap（デザイン用CSS） --}}
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>
