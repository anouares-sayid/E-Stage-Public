<?php

namespace App\Http\Controllers;

use App\Attestation;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class attestationController extends Controller
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
            "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))],
            Auth::user()->id => ['integer', Rule::exists('etudiants', 'user_id')]
        ]);
       
        $stage = Stage::where('id', $request->input('stage_id'))->first();
        $this->authorize('update',$stage);
        $attestation = Attestation::create([
            "commentaire" => $request->input('commentaire'),
             "stage_id" => $request->input('stage_id'),
             "etudiant_id" => Auth::user()->etudiant->id,
        
            
        ]);
     
        return response($attestation ,200);
    
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
        $attestation = Attestation::where('id', $id)->first();
        $stage = Stage::where('id', $attestation->stage_id)->first();
        $this->authorize('update',$stage);
        $attestation->update([
            "commentaire" => $request->input('commentaire'),
            "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($attestation ,200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attestation =  Attestation::where('id',$id)->first();
        $stage = Stage::where('id', $attestation->stage_id)->first();
        $this->authorize('update',$stage);
        $attestation->delete();
    }

    

    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Attestation  $attestations
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple($attestations)
    {
        
        foreach ($attestations as $attestation){
           
            $this->destroy($attestation->id);
        }
        
    }
}
