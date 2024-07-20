<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
    <h1>映画一覧</h1>
    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('movies.index') }}">
        <div>
            <label for="keyword">検索:</label>
            <input type="text" id="keyword" name="keyword" value="{{ request('keyword') }}">
        </div>
        <div>
            <label>
                <input type="radio" name="is_showing" checked value="" {{ request('is_showing') === null ? 'checked' : '' }}>
                すべて
            </label>
            <label>
                <input type="radio" name="is_showing" value="1" {{ request('is_showing') === '1' ? 'checked' : '' }}>
                公開中
            </label>
            <label>
                <input type="radio" name="is_showing" value="0" {{ request('is_showing') === '0' ? 'checked' : '' }}>
                公開予定
            </label>
        </div>
        <div>
            <button type="submit">検索</button>
        </div>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>画像URL</th>
                <th>公開年</th>
                <th>上映中かどうか</th>
                <th>ジャンル</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </tr>
        </thead>
    @foreach ($movies as $movie)
    <tr>
        <td>{{ $movie->id }}</td>
        <td> {{ $movie->title }}</td>
        <td>{{ $movie->image_url }}</td>
        <td>{{ $movie->published_year }}</td>
        <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
        <td>{{ $movie->genre ? $movie->genre->name : 'なし' }}</td>
        <td>{{ $movie->description }}</td>
        <td>{{ $movie->created_at }}</td>
        <td>{{ $movie->updated_at }}</td>
    </tr>
    @endforeach
</table>

 <!-- ページネーションリンク -->
 {{ $movies->appends(request()->query())->links() }}
</body>
</html>