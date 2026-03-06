<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];

    public function subtest()
    {
        return $this->belongsTo(Subtest::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }
}
