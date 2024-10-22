<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = "cidade";

    protected $fillable = ['estado_id', 'cidade_nome'];

    //Relacionamento com estado
    public function estado()
    {
        //A cidade só pode ter 1 estado, por isso belongsTo
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
