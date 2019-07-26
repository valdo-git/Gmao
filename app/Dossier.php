<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Dossier extends Model
{
    protected $table = 'dossiers';
    public $timestamps = false;

    protected $fillable = [
        'numero', 'designation','date_ouverture','date_fermeture',
    ];

    public function ordres()
    {
        return $this->hasMany('App\Ordre');
    }
  /*  public function getDateFermetureAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }
    public function getDateOuvertureAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }*/


}