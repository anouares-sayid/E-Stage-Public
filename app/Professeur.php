<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = [

        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function docFiles()
    {
        return $this->hasMany(docFile::class);
    }

    
   
}
