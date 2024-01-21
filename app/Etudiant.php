<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'apogee',
        'diplome',
        'active',
        'user_id'
    ];

    public function docFiles()
    {
        return $this->hasMany(docFile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function stages()
    {
        return $this->belongsToMany(Stage::class);
    }

}
