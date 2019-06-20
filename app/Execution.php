<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    protected $table = 'executions';
    public $timestamps = false;

    protected $fillable = [
        'date_exec', 'valeur_relevee',
    ];

   /* public function carte()
    {
        return $this->belongsTo('App\Materiel');
    }*/


}