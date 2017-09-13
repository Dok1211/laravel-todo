<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
