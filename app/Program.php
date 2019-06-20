<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Program extends Model
{
    protected $table = 'programs';
    public $timestamps = false;

    protected $fillable = [
        'num_prog', 'nom_programme','date_edition','materiel_id','doc_ref',
    ];

    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
    public function materiel()
    {
        return $this->belongsTo('App\Materiel');
    }
    public function getDateEditionAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }

}