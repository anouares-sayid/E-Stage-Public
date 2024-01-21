<?php

namespace App\Http\Controllers;

use App\ficheEvaluation;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ficheEvaluationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            "commentaire" => "string",
            "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))]
        ]);

        $stage = Stage::where('id', $request->input('stage_id'))->first();
        $this->authorize('update',$stage);

        $ficheEvaluation = ficheEvaluation::create([
            "commentaire" => $request->input('commentaire'),
            "etudiant_id" => Auth::user()->etudiant->id,
            "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($ficheEvaluation ,200);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            "commentaire" => "string",
            "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))]
        ]);
       
        $ficheEvaluation = ficheEvaluation::where('id', $id)->where('etudiant_id',Auth::user()->etudiant->id)->first();
        $stage = Stage::where('id', $ficheEvaluation->stage_id)->first();
        $this->authorize('update',$stage);
        $ficheEvaluation->update([
            "commentaire" => $request->input('commentaire'),
            "etudiant_id" => Auth::user()->etudiant->id,
            "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($ficheEvaluation ,200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ficheEvaluation = ficheEvaluation::where('id', $id)->where('etudiant_id',Auth::user()->etudiant->id)->first();
        $stage = Stage::where('id', $ficheEvaluation->stage_id)->first();
        $this->authorize('update',$stage);
        $ficheEvaluation->delete();
    }

    

    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  ficheEvaluation  $ficheEvaluations
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple($ficheEvaluations)
    {
        
        foreach ($ficheEvaluations as $ficheEvaluation){
           
            $this->destroy($ficheEvaluation->id);
        }
        
    }
}
