<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ordre extends Model
{
    protected $table = 'ordres';
    public $timestamps = false;
    /**
     * The operations that belong to the order.
     */
    public function operations()
    {
        return $this->belongsToMany('App\Operation','cartes')->withPivot('numero');
    }

    public function dossier()
    {
        return $this->belongsTo('App\Dossier');
    }
    public function getDateCreationAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }
}
