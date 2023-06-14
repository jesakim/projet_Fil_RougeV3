<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Patient extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'fname',
        'name',
        'phone',
        'cin',
        'gender',
        'assurance_id',
        'iswaiting',
        'birth-date'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['fname','name']
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

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function assurance()
    {
        return $this->belongsTo(Assurance::class);
    }
}
