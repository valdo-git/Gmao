<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Atelier extends Model
{
    protected $table = 'ateliers';
    public $timestamps = false;

    protected $fillable = [
        'nom_atelier', 'date_creation','nom_chef',
    ];

    public function materiels()
    {
        return $this->hasMany('App\Materiel');
    }

    public function getDateCreationAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }
}