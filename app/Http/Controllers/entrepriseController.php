<?php

namespace App\Http\Controllers;

use App\Entreprise;
use Illuminate\Http\Request;

class entrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $entreprises = Entreprise::all();
        return view('etudiant.entreprises.liste')->with(['entreprises' => $entreprises]);
   
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
            "acronyme" => "required|string",
            "adresse" => "required|string",
            "tel" => "required|string",
            "ville" => "required|string",
             ]);

        Entreprise::create([
            "acronyme" => $request->input('acronyme'),
            "adresse" => $request->input('adresse'),
            "tel" => $request->input('tel'),
            "ville" => $request->input('ville')
            
        ]);



       
        return redirect()->back()->with('success', 'entreprise ajouté avec succes');
   
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
        $entreprise = Entreprise::find($id);
        $response = [
            'entreprise' => $entreprise,
            'route' => route('entreprises.update', [$id])
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
    public function update(Request $request, $id)
    {
        $request->validate([
            "acronyme" => "required|string",
            "adresse" => "required|string",
            "tel" => "required|string",
            "ville" => "required|string",
             ]);

        Entreprise::where('id', $id)->first()->update([
            "acronyme" => $request->input('acronyme'),
            "adresse" => $request->input('adresse'),
            "tel" => $request->input('tel'),
            "ville" => $request->input('ville')
            
        ]);
        return redirect()->route('entreprises.index')->with('success', 'l\'entreprise a été modifié');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entreprise::where('id', $id)->first()->delete();
        return redirect()->route('entreprises.index')->with('success', 'l\'entreprise a été supprimé');
    }
}
