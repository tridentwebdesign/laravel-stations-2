@extends('layouts.app')

@section('content')
    <h1>スケジュール一覧</h1>

    @foreach ($movies as $movie)
        @if ($movie->schedules->count() > 0)
            <h2>{{ $movie->title }}</h2>
            <ul>
                @foreach ($movie->schedules as $schedule)
                    <li>
                        <a href="{{ route('admin.schedules.show', $schedule->id) }}">
                            開始: {{ $schedule->start_time }} - 終了: {{ $schedule->end_time }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
@endsection