<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operations';
    public $timestamps = false;

    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    /**
     * The echeances linked to the operation.
     */
    public function echeances()
    {
        return $this->hasMany('App\Echeance');
    }
    /**
     * The orders linked to the operation.
     */
    public function ordres()
    {
        return $this->belongsToMany('App\Ordre','cartes')->withPivot('numero');
    }
}