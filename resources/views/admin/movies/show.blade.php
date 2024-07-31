@extends('layouts.app')

@section('content')
    <h1>{{ $movie->title }}の詳細</h1>
    <p>画像: <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}"></p>
    <p>公開年: {{ $movie->published_year }}</p>
    <p>上映中かどうか: {{ $movie->is_showing ? '上映中' : '上映予定' }}</p>
    <p>ジャンル: {{ $movie->genre->name ?? 'N/A' }}</p>
    <p>概要: {{ $movie->description }}</p>
    <p>作成日時: {{ $movie->created_at }}</p>
    <p>更新日時: {{ $movie->updated_at }}</p>
    
    <h2>スケジュール</h2>
    <ul>
        @foreach ($movie->schedules as $schedule)
            <li>
                開始: {{ $schedule->start_time }} - 終了: {{ $schedule->end_time }}
                <a href="{{ route('admin.schedules.show', $schedule->id) }}">詳細</a>
            </li>
        @endforeach
    </ul>
@endsection