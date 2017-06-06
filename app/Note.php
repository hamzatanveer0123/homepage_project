<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['id', 'user_id'];
    function user(){
        return $this->belongsTo(User::class);
    }
}
