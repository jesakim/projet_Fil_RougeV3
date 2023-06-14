<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class act extends Model
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
        return $this->belongsToMany(dent::class,'act_dent','act_id','dent');
    }
}
