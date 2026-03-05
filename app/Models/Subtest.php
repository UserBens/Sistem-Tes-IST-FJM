<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtest extends Model
{
    protected $guarded = ['id'];
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
