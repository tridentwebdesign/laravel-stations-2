<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies List</title>
</head>
<body>
    <h1>Movies List</h1>
    <a href="/admin/movies/create">新規作成</a>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

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
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->image_url }}</td>
                    <td>{{ $movie->published_year }}</td>
                    <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                    <td>{{ $movie->genre->name ?? 'N/A' }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->created_at }}</td>
                    <td>{{ $movie->updated_at }}</td>
                    <td>
                        <button><a href="{{ route('admin.movies.edit', $movie->id) }}">編集</a></button>
                        <button><a href="{{ route('movies.show', $movie->id) }}">詳細</a></button>
                        <a href="{{ route('admin.movies.schedules', $movie->id) }}">スケジュール</a>
                    </td>
                    <td>
                        <form id="delete-form-{{ $movie->id }}" action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $movie->id }})">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $movies->links() }}

    <script>
        function confirmDelete(movieId) {
            if (confirm('削除しますか？')) {
                document.getElementById('delete-form-' + movieId).submit();
            }
        }
    </script>
</body>
</html>