<h1>新規作成</h1>
<form action="{{ route('movies.store') }}" method="POST">
  @csrf
  <div>
    <label for="title">映画タイトル</label>
    <input type="text" name="title" id="title">
    @error('title')
      <p>{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="image_url">画像URL</label>
    <input type="text" name="image_url" id="image_url">
    @error('image_url')
      <p>{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="published_year">公開年</label>
    <input type="text" name="published_year" id="published_year">
    @error('published_year')
      <p>{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="is_showing">公開中かどうか</label>
    <input type="checkbox" name="is_showing" id="is_showing" value="1">
    @error('is_showing')
      <p>{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="description">概要</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    @error('description')
      <p>{{ $message }}</p> 
    @enderror
  </div>
  <button type="submit">登録</button>
  <a href="{{ route('movies.index') }}">一覧へ戻る</a>
</form>