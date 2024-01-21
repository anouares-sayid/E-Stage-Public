<?php

namespace App\Http\Controllers;

use App\Presentation;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class presentationController extends Controller
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
        $presentation = Presentation::create([
            "commentaire" => $request->input('commentaire'),
             "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($presentation ,200);
    
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
       
        $presentation = Presentation::where('id', $id)->first();
        $stage = Stage::where('id', $presentation->stage_id)->first();
        $this->authorize('update',$stage);
        $presentation->update([
            "commentaire" => $request->input('commentaire'),
            "stage_id" => $request->input('stage_id')
        
            
        ]);
     
        return response($presentation ,200);
    
    }

  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presentation =  Presentation::where('id',$id)->first();
        $stage = Stage::where('id', $presentation->stage_id)->first();
        $this->authorize('update',$stage);
        $presentation->delete();
    }

    

    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Presentation  $presentations
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple($presentations)
    {
        
        foreach ($presentations as $presentation){
           
            $this->destroy($presentation->id);
        }
        
    }
}
