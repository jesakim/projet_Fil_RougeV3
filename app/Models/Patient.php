<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'assurance_id',
        'iswaiting',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class)->orderByDesc('date');
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }
}
