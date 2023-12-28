<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj'];

    public function colaboradores(): HasMany
    {
        return $this->hasMany(Colaborador::class);
    }
}
