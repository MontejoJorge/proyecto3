<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $guarded = [
        "id",
        "updated_at",
        "worker_id",
        "start_date",
        "end_date"
    ];

    public function solicitante(){
        //return "no";
        //return $this->hasMany(User::class);
        return $this->belongsTo(User::class, "requestor_id");
    }
    public function tipo_edificio(){
        return $this->belongsTo(TipoEdificio::class, "building_type");
    }
    public function tipo_obra(){
        return $this->belongsTo(TipoObra::class, "construction_type");
    }
    public function worker(){
        return $this->hasOneOrZero(Worker::class);
    }
    public function comment(){
        return $this->hasZeroOrMany(Comment::class);
    }
}
