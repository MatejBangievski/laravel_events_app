<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'type', 'date', 'organizer_id'];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
}
