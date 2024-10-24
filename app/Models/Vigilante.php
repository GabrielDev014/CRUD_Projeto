<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vigilante extends Model
{
    use HasFactory;

    protected $table = "vigilante";

    protected $fillable = ['id_estado', 'id_cidade', 'vigia_nome',
                           'vigia_celular', 'vigia_email', 'vigia_senha'];

    //Relacionamento com estado
    public function estado()
    {
        //O vigia só pode ter 1 estado, por isso belongsTo
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'id_cidade');
    }
}
