<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>createMovie</title>
</head>
<body>

@isset($movie)
  <h1>確認しました。</h1>
  <p>以下の内容で登録しました。</p>
  <div>
    <label for="title">タイトル</label>
    <p>{{ $movie->title }}</p>
  </div>
  <div>
    <label for="image_url">画像URL</label>
    <p>{{ $movie->image_url }}</p>
  </div>
  <div>
    <label for="published_year">公開年</label>
    <p>{{ $movie->published_year }}</p>
  </div>
  <div>
    <label for="is_showing">公開中かどうか</label>
    <p>{{ $movie->is_showing == 1 ? '公開中' : '非公開' }}</p>
  </div>
  <div>
    <label for="description">概要</label>
    <p>{{ $movie->description }}</p>
  </div>
@endisset

    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <h1>映画登録</h1>
    <form action="{{ route('admin.movies.store') }}" method="post">
        @csrf
    <div>    
    <label for="title">タイトル</label>
        <input type="text" name="title" id="title" required>
   </div>
        <label for="image_url">画像URL</label>
        <input type="text" name="image_url" id="image_url" required>
    </div>
    <div>
        <label for="published_year">公開年</label>
        <input type="text" name="published_year" id="published_year" required>
        </div>
    <div>
        <label for="is_showing">公開中かどうか</label>
            <input type="hidden" name="is_showing" value="0">
            <input type="checkbox" id="is_showing" name="is_showing" value="1" {{ old('is_showing') ? 'checked' : '' }}>
    </div>
    <div>
        <label for="description">概要</label>
        <textarea name="description" id="description" required></textarea>
    </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>