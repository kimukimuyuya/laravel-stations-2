<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href=" {{ asset('css/output.css') }}">
  <title>映画</title>
</head>
<body>
  <h1>映画一覧</h1>
  @if (session('flash_message'))
      <div>{{ session('flash_message') }}</div>
  @endif
  <table>
    <tr>
      <th>タイトル</th>
      <th>画像URL</th>
      <th>公開年</th>
      <th>上映中かどうか</th>
      <th>概要</th>
    </tr>
    @foreach ($movies as $movie)
      <tr>
        <td>{{ $movie->title }}</td>
        <td>{{ $movie->image_url }}</td>
        <td>{{ $movie->published_year }}</td>
        <td>
          @if ($movie->is_showing)
            上映中
          @else
            上映予定
          @endif
        </td>
        <td>{{ $movie->description }}</td>
        <td><a href="{{ route('movies.edit', ['movie' => $movie->id]) }}">編集</a></td>
        <td>
          <form action="{{ route('movies.destroy', ['movie' => $movie->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
          </form>
      </tr>
    @endforeach
  </table>
  <a href="{{ route('movies.create') }}">新規作成</a>
</body>
</html>