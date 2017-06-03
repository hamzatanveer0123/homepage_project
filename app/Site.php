<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }
}
