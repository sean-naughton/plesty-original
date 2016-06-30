<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $fillable = ['answer_id', 'user_id'];
}
