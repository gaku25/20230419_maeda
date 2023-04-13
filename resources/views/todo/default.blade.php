<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <title>ToDo-app</title>
</head>

<body>
  <section class="top">
    @if (Auth::check())
    <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
    @else
    <p>ログインしてください。（<a href="/login">ログイン</a>｜
    <a href="/register">登録</a>）</p>
    @endif
    <h1 class="top-title">@yield('title')</h1>
    <br>
    <div class="top-todo">@yield('from')</div>
    <br>
    <div class="top-list">@yield('list')</div>
  </section>
</body>

</html>
