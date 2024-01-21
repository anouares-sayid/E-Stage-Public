<?php

namespace App\Http\Controllers;

use App\Administrateur;
use App\docFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdministrateurController extends Controller
{
    
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $admin = Administrateur::where('user_id', Auth::id())->first();

        return view('admin.profile.profile', ['admin' => $admin]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function support(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $admin = Administrateur::all()->first();

        return view('admin.profile.profile', ['admin' => $admin]);
    }

    
    
    
    
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
        //
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
         $admin = Administrateur::findOrFail($id);

         return view('admin.profile.profile', ['admin' => $admin]);
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
        $admin = Administrateur::findOrFail($id);
       

        if ($request->password){
             /*
        * Validate all input fields
        */
        $this->validate($request, [
            'new_password' => 'confirmed|min:8|different:password',
        ]);
            if (Hash::check($request->password, $admin->user->password)) {
            
                $admin->user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
                $request->session()->flash('success', 'Profile modifié avec succès');
                } else {
                    $request->session()->flash('error', 'le mot de passe ne correspond pas');
                    return redirect()->route('admins.profile');
                }
              
        }
        


        if ($request->hasFile('profileImg')) {

            $request->validate([
                'profileImg' => ['required', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);
          
            $docFile =  $admin->user->docFiles->where('type','profileImg')->first();
            $path = $this->handleUploadedFile($request->file('profileImg'));
            if ($docFile != null) {
                Storage::delete($docFile->path);
                $docFile->update([
                    "path" => $path,
                ]);
            } else {
                docFile::create([
                    "type" => "profileImg",
                    "user_id" => $admin->user->id,
                    "path" => $path,
                ]);
            }
        }

        return redirect()->route('admins.profile')->with('success', 'Profile a etait modifié avec succes');
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
        //
    }
}
