<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;

    public function requestor_id(){
        return $this->hasMany(Requestor::class);
    }
    public function building_type(){
        return $this->hasOne(Building_type::class);
    }
    public function construction_type(){
        return $this->hasOne(Construction_type::class);
    }
    public function worker(){
        return $this->hasOneOrZero(Worker::class);
    }
    public function comment(){
        return $this->hasZero(Comment::class);
    }
}
