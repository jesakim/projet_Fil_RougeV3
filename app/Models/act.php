<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    use HasFactory;

    protected $fillable=[
        "service_name",
        "service_id",
        "service_name",
        "patient_id",
        "price",
        "comment",
        "status"
    ];

    public function dents()
    {
        return $this->belongsToMany(Dent::class,'act_dent','act_id','dent');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
