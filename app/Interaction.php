<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = ['interaction', 'user_id'];
    public function thread()
    {
        return $this->belongsTo(Topic::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
