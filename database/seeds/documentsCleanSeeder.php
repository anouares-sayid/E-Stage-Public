<?php

use App\Attestation;
use App\docFile;
use App\ficheEvaluation;
use App\Presentation;
use App\Rapport;
use Illuminate\Database\Seeder;

class documentsCleanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $fichesEvals = ficheEvaluation::whereNotIn('id',docFile::get('fiche_evaluation_id'))->get();

        foreach ($fichesEvals as $fichesEvaluation){
            $fichesEvaluation->first()->delete();
        }
        $rapports = Rapport::whereNotIn('id',docFile::get('rapport_id'))->get();
        foreach ($rapports as $rapport){
            $rapport->first()->delete();
        }
        $presentations = Presentation::whereNotIn('id',docFile::get('presentation_id'))->get();
        foreach ($presentations as $presentation){
            $presentation->first()->delete();
        }
        
        $attestations = Attestation::whereNotIn('id',docFile::get('attestation_id'))->get();

        foreach ($attestations as $attestation){
            $attestation->first()->delete();
        }

    }
}
