<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'place',

    ];

    public function organizers()
    {
        return $this->belongsToMany(Organizer::class);
    }
}
