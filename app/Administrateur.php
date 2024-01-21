<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    protected $fillable = [

        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function docFiles()
    {
        return $this->hasMany(docFile::class,'admin_id');
    }
}
