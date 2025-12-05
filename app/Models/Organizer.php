<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $fillable = ['full_name', 'email', 'phone'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

