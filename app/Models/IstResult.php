<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IstResult extends Model
{
    protected $guarded = ['id'];

    public function participant()
    {
        return $this->belongsTo(Participants::class, 'participant_id');
    }
}
