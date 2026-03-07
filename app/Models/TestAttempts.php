<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAttempts extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'started_at',
        'finished_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function participant()
    {
        return $this->belongsTo(Participants::class);
    }

    public function subtest()
    {
        return $this->belongsTo(Subtest::class);
    }

    public function answers()
    {
        return $this->hasMany(ParticipantAnswer::class, 'attempt_id');
    }
}
