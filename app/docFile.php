<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docFile extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'type',
        'fiche_evaluation_id',
        'rapport_id',
        'presentation_id',
        'attestation_id',
        'user_id',
    ];


    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ficheEvaluation()
    {
        return $this->belongsTo(ficheEvaluation::class);
    }
    public function attestation()
    {
        return $this->belongsTo(Attestation::class);
    }
    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
    public function rapport()
    {
        return $this->belongsTo(Rapport::class);
    }

}
