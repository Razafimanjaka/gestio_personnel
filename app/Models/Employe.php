<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule', 'nom', 'prenom', 'date_naissance', 'adresse', 
        'email', 'telephone', 'cin', 'departement_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($employe) {
            $employe->matricule = 'EMP-' . str_pad(self::count() + 1, 5, '0', STR_PAD_LEFT);
        });
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
