<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'motif',
        'type_sanction',
        'description'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
