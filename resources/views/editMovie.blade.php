<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Movie</title>
</head>
<body>
@if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
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
    <h1>映画編集</h1>
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>
        <div>
            <label for="image_url">画像URL</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $movie->image_url) }}" required>
        </div>
        <div>
            <label for="published_year">公開年</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year', $movie->published_year) }}" required>
        </div>
        <div>
            <label for="is_showing">公開中かどうか:</label>
            <input type="hidden" name="is_showing" value="0">
            <input type="checkbox" id="is_showing" name="is_showing" value="1" {{ old('is_showing', $movie->is_showing) ? 'checked' : '' }}>
        </div>
        <div>
            <label for="description">概要</label>
            <textarea id="description" name="description" required>{{ old('description', $movie->description) }}</textarea>
        </div>
            <label for="genre">ジャンル</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre', optional($movie->genre)->name) }}">
        <div>
            <button type="submit">更新する</button>
        </div>
    </form>
</body>
</html>