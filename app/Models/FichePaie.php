<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichePaie extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'montant',
        'date_paie'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
