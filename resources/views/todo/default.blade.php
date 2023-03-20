<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app.css">
  <link rel="stylesheet" href="reset.css">
  <title>ToDo-app</title>
</head>

<body>
  <section class="top">
    <h1 class="top-tetle">@yield('title')</h1>
    <div class="top-todo">@yield('from')</div>
    <div class="top-list">@yield('list')</div>
  </session>
</body>

</html>