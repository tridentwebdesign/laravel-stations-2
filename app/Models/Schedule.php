<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'start_time',
        'end_time',
    ];

    // キャストを追加
    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    // movieリレーションシップを追加
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
