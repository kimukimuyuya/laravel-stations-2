<h1>編集</h1>
<form action="{{route('movies.update',['movie'=>$movie->id])}}" method="post">
  @csrf
  @method('PATCH')
    <input type="hidden" name="id" value="{{ $movie->id }}">
    <input type="text" name="title" value="{{ $movie->title}}">
    <input type="text" name="image_url" value="{{ $movie->image_url}}">
    <input type="text" name="published_year" value="{{ $movie->published_year}}">
    <input type="text" name="is_showing" value="{{ $movie->is_showing}}">
    <textarea name="description" cols="30" rows="10">{{ $movie->description}}</textarea>
    <input type="submit" value="更新する">
  </form>
  <a href="{{ route('movies.index') }}">一覧へ戻る</a>