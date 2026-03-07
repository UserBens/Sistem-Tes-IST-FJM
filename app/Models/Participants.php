<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'birth_date',
        'test_started_at',
        'test_finished_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    // peserta memiliki banyak attempt
    public function attempts()
    {
        return $this->hasMany(TestAttempts::class);
    }
}
