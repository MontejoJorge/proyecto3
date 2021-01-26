<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public function obra(){
        return $this->belongsTo(Obra::class, "obra_id");
    }

    public function trabajador(){
        return $this->belongsTo(Trabajador::class, "worker_id");
    }
}
