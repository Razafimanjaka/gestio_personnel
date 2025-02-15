<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'type_contrat',
        'poste',
        'salaire',
        'date_debut',
        'date_fin'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
