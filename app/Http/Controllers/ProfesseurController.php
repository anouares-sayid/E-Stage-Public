<?php

namespace App\Http\Controllers;

use App\docFile;
use App\Professeur;
use App\Stage;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfesseurController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $professeur = Professeur::where('user_id', Auth::id())->first();

        return view('professeur.profile.profile', ['professeur' => $professeur]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encadrerStages(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $request->validate([
            "stages_id.*" => ['required', 'numeric', Rule::exists('stages', 'id')->where('id', $request->input('stages_id'))],
           
        ]);
        Stage::whereIn('id',explode(",",$request->input('stages_id')))->update([
            'encadrant_id' => Auth::user()->professeur->id
        ]);

        return redirect()->route('stages.index')->with('success', 'Stages encadrés avec succès');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function retirerStage(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $request->validate([
            "stage_id" => ['required', 'numeric', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))],
           
        ]);
        //abort_if(Gate::denies('semestre_index'), 403);
        Stage::where('id',$request->input('stage_id'))->update([
            'encadrant_id' => null
        ]);


        return redirect()->route('stages.encadrer')->with('success', 'Stage retiré avec succès');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validerStage(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $request->validate([
            "stage_id" => ['required', 'numeric', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))],
           
        ]);
        //abort_if(Gate::denies('semestre_index'), 403);
        
        Stage::where('id',$request->input('stage_id'))->update([
            'is_valid' => true
        ]);

        
        return redirect()->route('stages.encadrer')->with('success', 'Stage validé avec succès');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unvaliderStage(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $request->validate([
            "stage_id" => ['required', 'numeric', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))],
           
        ]);
        //abort_if(Gate::denies('semestre_index'), 403);
        
        Stage::where('id',$request->input('stage_id'))->update([
            'is_valid' => false
        ]);

        return redirect()->route('stages.encadrer')->with('success', 'Stage unvalidé avec succes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

          }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        //abort_if(Gate::denies('semestre_index'), 403);
        $professeur = Professeur::findOrFail($id);

        return view('professeur.profile.profile', ['professeur' => $professeur]);
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
        
        $request->getSession()->put('operation', 'update');
        $professeur = Professeur::findOrFail($id);
       

        if ($request->password){
             /*
        * Validate all input fields
        */
        $this->validate($request, [
            'new_password' => 'confirmed|min:8|different:password',
        ]);
            if (Hash::check($request->password, $professeur->user->password)) {
            
                $professeur->user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
                $request->session()->flash('success', 'Profile modifié avec succès');
                } else {
                    $request->session()->flash('error', 'Password does not match');
                    return redirect()->route('professeurs.profile');
                }
              
        }
        


        if ($request->hasFile('profileImg')) {

            $request->validate([
                'profileImg' => ['required', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);
          
            $docFile =  $professeur->user->docFiles->where('type','profileImg')->first();
            $path = $this->handleUploadedFile($request->file('profileImg'));
            if ($docFile != null) {
                Storage::delete($docFile->path);
                $docFile->update([
                    "path" => $path,
                ]);
            } else {
                docFile::create([
                    "type" => "profileImg",
                    "user_id" => $professeur->user->id,
                    "path" => $path,
                ]);
            }
        }

        return redirect()->route('professeurs.profile')->with('success', 'Profile a etait modifié avec succes');
    }

    public function handleUploadedFile($files)
    {

        
        if (!is_null($files)) {

            if(is_array($files)) {
                foreach ($files as $file) {
                
                    $path =  Storage::putFile('profileImgs', $file);
                    }
            }else{
                
                $path =  Storage::putFile('profileImgs', $files);
            }
            
        }
        return $path;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

}
