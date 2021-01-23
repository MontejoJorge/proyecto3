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
}
