@extends('layouts.app')

@section('content')
    <h1>スケジュール詳細</h1>
    <p>作品ID: {{ $schedule->movie_id }}</p>
    <p>開始時刻: {{ $schedule->start_time }}</p>
    <p>終了時刻: {{ $schedule->end_time }}</p>
    <p>作成日時: {{ $schedule->created_at }}</p>
    <p>更新日時: {{ $schedule->updated_at }}</p>
    <a href="{{ route('admin.schedules.edit', $schedule->id) }}">編集</a>
    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
    </form>
@endsection