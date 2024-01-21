<?php

namespace App\Http\Controllers;

use App\docFile;
use App\Etudiant;
use App\Rapport;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EtudiantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $etudiant = Etudiant::where('user_id', Auth::id())->first();

        return view('etudiant.profile.profile', ['etudiant' => $etudiant]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $etudiant = Etudiant::findOrFail($id);

        return view('etudiant.profile.profile', ['etudiant' => $etudiant]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $etudiants = Etudiant::all();

        return view('admin.etudiants.liste', ['etudiants' => $etudiants]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function etudiantsParProf()
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $stages = Stage::whereNotNull('encadrant_id')->get();
        

        return view('admin.etudiants.parProf', ['stages' => $stages]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function etudiantsSansEncadr()
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $stages = Stage::where('encadrant_id',null)->get();
        
      
        
        return view('admin.etudiants.sansEncadr', ['stages' => $stages]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function etudiantsSansRapp()
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $stages = Stage::whereNotIn('id',Rapport::all('stage_id'))->get();

        return view('admin.etudiants.sansRapp', ['stages' => $stages]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function etudiantsSansStage()
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $etudiants = Etudiant::whereNotIn('id',DB::table('etudiant_stage')->select('etudiant_id'))->get();

        return view('admin.etudiants.sansStage', ['etudiants' => $etudiants]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $etudiant = Etudiant::findOrFail($id);
       

        if ($request->password){
             /*
        * Validate all input fields
        */
        $this->validate($request, [
            'new_password' => 'confirmed|min:8|different:password',
        ]);
            if (Hash::check($request->password, $etudiant->user->password)) {
            
                $etudiant->user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
        
                } else {
                    $request->session()->flash('error', 'Password does not match');
                    return redirect()->route('etudiants.profile');
                }
              
        }
        


        if ($request->hasFile('profileImg')) {

            $request->validate([
                'profileImg' => ['required', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);
          
            $docFile =  $etudiant->user->docFiles->where('type','profileImg')->first();
            $path = $this->handleUploadedFile($request->file('profileImg'));
            if ($docFile != null) {
                Storage::Disk('s3')->delete($docFile->path);
                $docFile->update([
                    "path" => $path,
                ]);
            } else {
                docFile::create([
                    "type" => "profileImg",
                    "user_id" => $etudiant->user->id,
                    "path" => $path,
                ]);
            }
        }

        return redirect()->route('etudiants.profile')->with('success', 'Profile a etait modifié avec succes');
    }

    public function handleUploadedFile($files)
    {

        
        if (!is_null($files)) {

            if(is_array($files)) {
                foreach ($files as $file) {
                
                    $path =  Storage::Disk('s3')->put('profileImgs', $file);
                    }
            }else{
                
                $path =  Storage::Disk('s3')->put('profileImgs', $files);
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
        //
    }
}
