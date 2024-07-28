@extends('layouts.app')

@section('content')
    <h1>スケジュール編集 - {{ $schedule->movie->title }}</h1>

    <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="start_time_date">開始日付</label>
            <input type="date" id="start_time_date" name="start_time_date" value="{{ date('Y-m-d', strtotime($schedule->start_time)) }}" required>
        </div>
        <div>
            <label for="start_time_time">開始時間</label>
            <input type="time" id="start_time_time" name="start_time_time" value="{{ date('H:i', strtotime($schedule->start_time)) }}" required>
        </div>
        <div>
            <label for="end_time_date">終了日付</label>
            <input type="date" id="end_time_date" name="end_time_date" value="{{ date('Y-m-d', strtotime($schedule->end_time)) }}" required>
        </div>
        <div>
            <label for="end_time_time">終了時間</label>
            <input type="time" id="end_time_time" name="end_time_time" value="{{ date('H:i', strtotime($schedule->end_time)) }}" required>
        </div>
        <button type="submit">更新</button>
    </form>

    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
    </form>
@endsection