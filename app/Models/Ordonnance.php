<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable=['patient_id'];

    public function drugs(): BelongsToMany
    {
        return $this->belongsToMany(Drug::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
