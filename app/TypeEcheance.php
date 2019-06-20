<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEcheance extends Model
{
    protected $table = 'typeecheances';
    public $timestamps = false;

    protected $fillable = [
        'libelle', 'Observations',
    ];

    public function echeance()
    {
        return $this->hasMany('App\Echeance');
    }
}