<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'nome',
        'cidade_id',
        'especialidade',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function consulta()
    {
        return $this->hasMany(Consulta::class);
    }
}
