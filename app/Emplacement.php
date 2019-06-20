<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Emplacement extends Model
{
    protected $table = 'emplacements';
    public $timestamps = false;

    protected $fillable = [
        'designation', 'gisement','observations',
    ];

    public function materiels()
    {
        return $this->hasMany('App\Materiel');
    }
}