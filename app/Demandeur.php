<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandeur extends Model
{
    protected $table = 'demandeurs';
    public $timestamps = false;

    protected $fillable = [
        'nom_demandeur', 'type_demandeur',
    ];

    public function exploitations()
    {
        return $this->hasMany('App\Exploitation');
    }


}