<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>映画</title>
</head>
<body>
  <h1>映画一覧</h1>
  <ul>
    @foreach ($movies as $movie)
      <li>{{ $movie->title }}</li>
      <li>{{ $movie->image_url}}</li>
    @endforeach
  </ul>
</body>
</html>