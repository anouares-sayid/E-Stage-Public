<?php

namespace App\Http\Controllers;

use App\Entreprise;
use App\Etudiant;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class stageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->hasRole('Super Admin')){
            $stages = Stage::all();
            return view('admin.stages.liste')->with(['stages' => $stages]);
        
        }elseif(Auth::user()->hasRole('Professeur')){
            $stages = Stage::all();
            return view('professeur.stages.liste')->with(['stages' => $stages]);
        
        }elseif(Auth::user()->hasRole('User')){
            $stages = Auth::user()->etudiant->stages;
            $entreprises = Entreprise::all();
            $etudiants = Etudiant::whereNotIn('id', [Auth::user()->etudiant->id])->get();
            return view('etudiant.stages.liste')->with(['etudiants' => $etudiants,'stages' => $stages, 'entreprises' => $entreprises]);
        
        }
    
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encadrer()
    {   
       

        if(Auth::user()->hasRole('Professeur')){
            $stages = Stage::where('encadrant_id',Auth::user()->professeur->id)->get();
            return view('professeur.stages.encadrer')->with(['stages' => $stages]);
        
        }
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notes()
    {   
       

        if(Auth::user()->hasRole('Professeur')){
            $stages = Stage::where('encadrant_id',Auth::user()->professeur->id)->where('is_valid',true)->get();
            return view('professeur.notes.liste')->with(['stages' => $stages]);
        
        }elseif(Auth::user()->hasRole('Super Admin')){
            $stages = Stage::whereNotNull('note')->where('is_valid',true)->whereNotNull('encadrant_id')->get();
            return view('admin.notes.liste')->with(['stages' => $stages]);

        }
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function valid()
    {   
        if(Auth::user()->hasRole('Super Admin')){
            $stages = Stage::where('is_valid',true)->whereNotNull('encadrant_id')->get();
            
            return view('admin.stages.valid')->with(['stages' => $stages]);

        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "sujet" => "required|string",
            "description" => "required|string",
            "encadrant_prof_nom" => "required|string",
            "encadrant_prof_prenom" => "required|string",
            "encadrant_prof_prenom" => "required|string",
            "encadrant_prof_tel" => "required|string",
            "encadrant_prof_email" => "required|string",
            "etudiant_id.*" => ['required', 'integer', Rule::exists('etudiants', 'id')->where('id', $request->input('etudiant_id'))],
            "etudiant_id.*" => ['required', 'integer', Rule::unique('etudiant_stage', 'etudiant_id')->where('etudiant_id', $request->input('etudiant_id'))],
            "entreprise_id"=> ['required', 'integer', Rule::exists('entreprises', 'id')->where('id', $request->input('entreprise_id'))],
        ]);
        Validator::make( ['id'=>Auth::user()->etudiant->id],[
            'id' => ['integer', Rule::unique('etudiant_stage', 'etudiant_id')->where('etudiant_id', Auth::user()->etudiant->id)],
        ])->validate();

        $stage = Stage::create([
            "sujet" => $request->input('sujet'),
            "description" => $request->input('description'),
            "encadrant_prof_nom" => $request->input('encadrant_prof_nom'),
            "encadrant_prof_prenom" => $request->input('encadrant_prof_prenom'),
            "encadrant_prof_tel" => $request->input('encadrant_prof_tel'),
            "encadrant_prof_email" => $request->input('encadrant_prof_email'),
            "entreprise_id"=> $request->input('entreprise_id'),
            
        ]);

        $stage->etudiants()->attach(Auth::user()->etudiant->id);
        $stage->etudiants()->attach($request->input('etudiant_id'));
    
        return redirect()->route('stages.index')->with('success', 'stage ajouté avec ajouté avec succès');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stage =Stage::where('id',$id)->first();
        return view('etudiant.stages.show')->with(['stage' => $stage]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stage = Stage::find($id);
        $etudiants = $stage->etudiants;
        $this->authorize('update',$stage);
        $response = [
            'stage' => $stage,
            'etudiants' => $etudiants,
            'route' => route('stages.update', [$id])
        ];
        return response()->json($response, 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNote($id)
    {
        $stage = Stage::find($id);

        $response = [
            'stage' => $stage,
            'route' => route('stages.noter', [$id])
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function noter(Request $request, $id)
    {
       
        $request->validate([
            "note" => "required|numeric|between:0,20",
           ]);

    

   
       Stage::where('id', $id)->first()->update([
            "note" => $request->input('note'),
            
        ]);

        return redirect()->route('stages.notes')->with('success', 'le stage a été noté');
    
       }
        
        
        
        
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stage = Stage::where('id', $id)->first();
        $this->authorize('update',$stage);
        $request->validate([
            "sujet" => "required|string",
            "description" => "required|string",
            "encadrant_prof_nom" => "required|string",
            "encadrant_prof_prenom" => "required|string",
            "encadrant_prof_tel" => "required|string",
            "encadrant_prof_email" => "required|string",
            "entreprise_id"=> ['required', 'integer', Rule::exists('entreprises', 'id')->where('id', $request->input('entreprise_id'))],
            "etudiant_id.*" => ['required', 'numeric', Rule::exists('etudiants', 'id')->where('id', $request->input('etudiant_id'))],
            "etudiant_id.*" => ['required', 'integer', Rule::unique('etudiant_stage', 'etudiant_id')->where('etudiant_id', $request->input('etudiant_id'))->whereNot('stage_id', $id)],
            
        ]);
       
        Validator::make( ['id'=>Auth::user()->etudiant->id],[
            'id' => ['integer', Rule::unique('etudiant_stage', 'etudiant_id')->where('etudiant_id', Auth::user()->etudiant->id)->whereNot('stage_id', $id)],
        ])->validate();
       
        

    
   
        $stage->update([
            "sujet" => $request->input('sujet'),
            "description" => $request->input('description'),
            "encadrant_prof_nom" => $request->input('encadrant_prof_nom'),
            "encadrant_prof_prenom" => $request->input('encadrant_prof_prenom'),
            "encadrant_prof_tel" => $request->input('encadrant_prof_tel'),
            "encadrant_prof_email" => $request->input('encadrant_prof_email'),
            "entreprise_id"=> $request->input('entreprise_id'),
            
        ]);
        Stage::where('id', $id)->first()->etudiants()->sync($request->input('etudiant_id'));
        Stage::where('id', $id)->first()->etudiants()->attach(Auth::user()->etudiant->id);
        return redirect()->route('stages.index')->with('success', 'le stage a été modifié');
    
       
       }
 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAttachments($Stage)
    {
        
        if ($Stage->presentations != null) {

            $presentationController = new presentationController();
            $presentationController->destroyMultiple($Stage->presentations);
        } 
        if ($Stage->attestations != null) {

            $attestationController = new attestationController();
            $attestationController->destroyMultiple($Stage->attestations);
        } 
        if ($Stage->fiche_evaluations != null) {

            $ficheEvaluationController = new ficheEvaluationController();
            $ficheEvaluationController->destroyMultiple($Stage->fiche_evaluations);
        } 
        if ($Stage->rapports != null) {

            $rapportController = new rapportController();
            $rapportController->destroyMultiple($Stage->rapports);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stage = Stage::where('id',$id)->first();
        $this->authorize('delete',$stage);

        
        $this->destroyAttachments($stage);
        $stage->delete();
        return redirect()->route('stages.index')->with('success', 'le stage a été supprimé');
   
    }
}
