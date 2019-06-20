<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
    protected $table = 'echeances';
    public $timestamps = false;

    protected $fillable = [
        'valeur', 'unite','typeecheance','operation_id',
    ];

    public function operation()
    {
        return $this->belongsTo('App\Operation');
    }
}