<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'acronyme',
       'adresse',
       'tel',
       'ville'
    ];

    public function stages(){

        return $this->hasMany(Stage::class);
    }
}
