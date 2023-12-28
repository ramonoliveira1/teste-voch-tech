<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = ['cargo'];

    public function cargoColaboradores(): HasMany
    {
        return $this->hasMany(CargoColaborador::class);
    }
}
