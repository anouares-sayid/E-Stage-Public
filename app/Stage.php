<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sujet',
        'note',
        'is_valid',
        'encadrant_prof_prenom',
        'encadrant_prof_nom',
        'encadrant_prof_tel',
        'encadrant_prof_email',
        'description',
        'encadrant_id',
        'entreprise_id'   
     ];




    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function encadrant()
    {
        return $this->belongsTo(Professeur::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    
    public function ficheEvaluations()
    {
        return $this->hasMany(ficheEvaluation::class);
    }
    public function attestations()
    {
        return $this->hasMany(Attestation::class);
    }
    public function presentations()
    {
        return $this->hasMany(Presentation::class);
    }
    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}
