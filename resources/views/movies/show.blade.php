<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $movie->title }} の詳細</title>
</head>
<body>
    <h1>{{ $movie->title }} の詳細</h1>
    <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}">
    <p>公開年: {{ $movie->published_year }}</p>
    <p>上映中: {{ $movie->is_showing ? 'はい' : 'いいえ' }}</p>
    <p>ジャンル: {{ $movie->genre->name ?? 'N/A' }}</p>
    <p>概要: {{ $movie->description }}</p>

    <h2>上映スケジュール</h2>
    <ul>
        @foreach ($schedules as $schedule)
            <li>{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}</li>
        @endforeach
    </ul>

    <a href="{{ route('admin.movies.index') }}">映画一覧に戻る</a>
</body>
</html>