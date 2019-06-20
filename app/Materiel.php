<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Materiel extends Model
{
   protected $table = 'materiels';
   public $timestamps = false;

    public function operations()
    {
        return $this->hasManyThrough('App\Operation', 'App\Program');
    }
    /**
     * Get the program record associated with the materiel.
     */
    public function program()
    {
        return $this->hasOne('App\Program');
    }

    public function exploitations()
    {
        return $this->hasMany('App\Exploitation');
    }

    public function getdateAcquisitionMatAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }

    public function getdateMiseEnCircAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }

    public function getdateInstallationAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }
}