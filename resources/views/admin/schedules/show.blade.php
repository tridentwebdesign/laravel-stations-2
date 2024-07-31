@extends('layouts.app')

@section('content')
    <h1>{{ $movie->title }}のスケジュール</h1>

    @if ($schedules->count() > 0)
        <ul>
            @foreach ($schedules as $schedule)
                <li>
                    開始: {{ $schedule->start_time }} - 終了: {{ $schedule->end_time }}
                </li>
            @endforeach
        </ul>
    @else
        <p>この映画にはスケジュールが設定されていません。</p>
    @endif
@endsection