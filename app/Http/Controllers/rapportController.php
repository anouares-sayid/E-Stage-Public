<?php

namespace App\Http\Controllers;

use App\Rapport;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class rapportController extends Controller
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
            "rapportVersion" => "string|required",
            "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))]
        ]);
       
        $stage = Stage::where('id', $request->input('stage_id'))->first();
        $this->authorize('update',$stage);
        $rapport = Rapport::create([
            "commentaire" => $request->input('commentaire'),
            "version" => $request->input('rapportVersion'),
            "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($rapport ,200);
    
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
            "rapportVersion" => "string|required",
            "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))]
        ]);
        $rapport = Rapport::where('id', $id)->first();
        $stage = Stage::where('id', $rapport->stage_id)->first();
        $this->authorize('update',$stage);
        $rapport->update([
            "commentaire" => $request->input('commentaire'),
            "version" => $request->input('rapportVersion'),
            "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($rapport ,200);
    
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rapport =  Rapport::where('id',$id)->first();
        $stage = Stage::where('id', $rapport->stage_id)->first();
        $this->authorize('update',$stage);
        $rapport->delete();
    }

    

    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Rapport  $rapports
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple($rapports)
    {
        
        foreach ($rapports as $rapport){
            
            $this->destroy($rapport->id);
        }
        
    }
}
