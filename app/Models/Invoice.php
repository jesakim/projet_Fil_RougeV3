<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable=['patient_id','service_id','rest'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
