<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Movie;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $movies = Movie::with('schedules')->get();
        return view('admin.schedules.index', compact('movies'));
    }

    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedules.show', compact('schedule'));
    }

    public function create($movie_id)
    {
        $movie = Movie::findOrFail($movie_id);
        return view('admin.schedules.create', compact('movie'));
    }

    public function store(Request $request, $movie_id)
    {
        $request->validate([
            'start_time_date' => 'required|date',
            'start_time_time' => 'required|date_format:H:i',
            'end_time_date' => 'required|date',
            'end_time_time' => 'required|date_format:H:i',
        ]);

        $start_time = $request->start_time_date . ' ' . $request->start_time_time;
        $end_time = $request->end_time_date . ' ' . $request->end_time_time;

        Schedule::create([
            'movie_id' => $movie_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time_date' => 'required|date',
            'start_time_time' => 'required|date_format:H:i',
            'end_time_date' => 'required|date',
            'end_time_time' => 'required|date_format:H:i',
        ]);

        $start_time = $request->start_time_date . ' ' . $request->start_time_time;
        $end_time = $request->end_time_date . ' ' . $request->end_time_time;

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}