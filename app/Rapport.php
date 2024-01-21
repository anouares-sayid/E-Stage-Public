<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commentaire',
        'version',
        'stage_id'  
     ];
     public function docFile()
     {
         return $this->hasOne(docFile::class);
     }

     public function stage(){

        return $this->belongsTo(Stage::class);
    }
}
