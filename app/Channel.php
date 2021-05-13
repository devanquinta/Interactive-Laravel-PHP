<?php

namespace App;

// CANAIS

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public function topics()
    {
        return $this->hasMany(Topic::class)->orderBy('created_at', 'desc');
    }
    public function channel()
    {
        return $this->hasMany(Channel::class, 'id');
        // return $this->belongsTo(Role::class, 'role_id');
    }
}
