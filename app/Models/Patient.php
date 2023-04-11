<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Patient extends Model
{
    use HasFactory,Sluggable;

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
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
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
