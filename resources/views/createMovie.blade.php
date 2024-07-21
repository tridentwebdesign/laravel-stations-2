<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Movie</title>
</head>
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

    <form action="{{ route('admin.movies.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="image_url">画像URL</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}" required>
        </div>
        <div>
            <label for="published_year">公開年</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}" required>
        </div>
        <div>
            <label for="is_showing">公開中かどうか:</label>
            <input type="hidden" name="is_showing" value="0">
            <input type="checkbox" id="is_showing" name="is_showing" value="1" {{ old('is_showing') ? 'checked' : '' }}>
        </div>
        <div>
            <label for="genre">ジャンル</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required>
        </div>
        <div>
            <label for="description">概要</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <button type="submit">作成する</button>
        </div>
    </form>
</body>
</html>