<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = ['id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
