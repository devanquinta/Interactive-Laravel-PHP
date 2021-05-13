<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Interaction;
use App\Channel;

class Topic extends Model
{
    protected $fillable = ['title','body', 'slug', 'channel_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interactions()
    {
        return $this->hasMany(Interaction::class)->orderBy('created_at', 'desc');
        // Ordedenando as respostas
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
