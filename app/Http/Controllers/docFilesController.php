<?php

namespace App\Http\Controllers;

use App\Attestation;
use App\docFile;
use App\ficheEvaluation;
use App\Presentation;
use App\Rapport;
use App\Stage;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class docFilesController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Super Admin')){
            $documents = docFile::whereNotNull('fiche_evaluation_id')->orWhereNotNull('attestation_id')->orWhereNotNull('rapport_id')->orWhereNotNull('presentation_id')->get();
        
            return view('professeur.documents.liste')->with(['documents' => $documents]);
        
        }elseif(Auth::user()->hasRole('Professeur')){
            $documents = docFile::whereNotNull('fiche_evaluation_id')->orWhereNotNull('attestation_id')->orWhereNotNull('rapport_id')->orWhereNotNull('presentation_id')->get();
    
            return view('professeur.documents.liste')->with(['documents' => $documents]);
        

        }elseif(Auth::user()->hasRole('User')){

            $stages = Auth::user()->etudiant->stages;
            $stages_ids=['null'];
            $i = 0;
            foreach ($stages as $stage){
                $stages_ids[$i] = $stage->id;
                $i++;
            }
            if($stages_ids[0]!='null'){
            $documents = docFile::whereIn('fiche_evaluation_id',ficheEvaluation::whereIn('stage_id',$stages_ids)->get('id'))->orWhereIn('attestation_id',Attestation::whereIn('stage_id',$stages_ids)->get('id'))->orWhereIn('rapport_id',Rapport::whereIn('stage_id',$stages_ids)->get('id'))->orWhereIn('presentation_id',Presentation::whereIn('stage_id',$stages_ids)->get('id'))->get();
            }else{
                $documents=[];
            }
            return view('etudiant.documents.liste')->with(['documents' => $documents, 'stages' => $stages]);
        
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
        if ($request->hasFile('docFile')) {
            $request->validate([
                "commentaire" => "string",
                "fileType" => "required|string",
                "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))],
                'docFile.*' => ['required', 'mimes:pdf', 'max:51200']
            ]);

            if ($request->input('fileType') == 'presentation') {


                $presentationController = new presentationController();
                $presentation = $presentationController->store($request);

                $path = $this->handleUploadedFile($request->file('docFile'));

                docFile::create([
                    "presentation_id" => json_decode($presentation->getContent())->id,
                    "path" => $path,
                ]);
                
            } elseif ($request->input('fileType') == 'attestation') {

                $attestationController = new attestationController();
                $attestation = $attestationController->store($request);

                $path = $this->handleUploadedFile($request->file('docFile'));

                docFile::create([
                    "attestation_id" =>  json_decode($attestation->getContent())->id,
                    "path" => $path,
                ]);
            } elseif ($request->input('fileType') == 'ficheEvaluation') {


                $ficheEvaluationController = new ficheEvaluationController();
                $ficheEvaluation = $ficheEvaluationController->store($request);

                $path = $this->handleUploadedFile($request->file('docFile'));

                docFile::create([
                    "fiche_evaluation_id" => json_decode($ficheEvaluation->getContent())->id,
                    "path" => $path,
                ]);

            } elseif ($request->input('fileType') == 'rapport') {

                $request->validate([
                    "rapportVersion" => "required|string"
                ]);

                $rapportController = new rapportController();
                $rapport = $rapportController->store($request);

                $path = $this->handleUploadedFile($request->file('docFile'));

                docFile::create([
                    "rapport_id" => json_decode($rapport->getContent())->id,
                    "path" => $path,
                ]);
            }

            return redirect()->route('documents.index')->with('success', 'document ajouté avec succès');
        }
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


        $docFile = docFile::find($id);

        if ($docFile->ficheEvaluation != null) {
            $document = $docFile->ficheEvaluation;
            $docType ='ficheEvaluation';
        } elseif ($docFile->rapport != null) {
            $document = $docFile->rapport;
            $docType ='rapport';
        } elseif ($docFile->presentation != null) {
            $document = $docFile->presentation;
            $docType ='presentation';
        } elseif ($docFile->attestation != null) {
            $document = $docFile->attestation;
            $docType ='attestation';
        } else {
            $document = null;
        };
        $response = [
            'docFile' => $docFile,
            'document' => $document,
            'docType' => $docType,
            'route' => route('documents.update', [$id])
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
            "commentaire" => "string",
            "fileType" => "required|string",
            "stage_id" => ['required', 'integer', Rule::exists('stages', 'id')->where('id', $request->input('stage_id'))]
        ]);
        $docFile = docFile::where('id', $id)->first();
        if ($request->input('fileType') == 'presentation' && $docFile->presentation_id != null) {

            $presentationController = new presentationController();
            $presentationController->update($request, $docFile->presentation_id);
        } elseif ($request->input('fileType') == 'attestation' && $docFile->attestation_id != null) {

            $attestationController = new attestationController();
            $attestationController->update($request, $docFile->attestation_id);
        } elseif ($request->input('fileType') == 'ficheEvaluation'  && $docFile->ficheEvaluation_id != null) {


            $ficheEvaluationController = new ficheEvaluationController();
            $ficheEvaluation = $ficheEvaluationController->update($request, $docFile->ficheEvaluation);
        } elseif ($request->input('fileType') == 'rapport'  && $docFile->rapport_id != null) {

            $request->validate([
                "rapportVersion" => "required|string"
            ]);

            $rapportController = new rapportController();
            $rapport = $rapportController->update($request, $docFile->rapport_id);
        } else {

            $docFileCopy = clone $docFile;
            if ($request->input('fileType') == 'presentation') {


                $presentationController = new presentationController();
                $presentation = $presentationController->store($request);
                $docFile->update([
                    "presentation_id" => json_decode($presentation->getContent())->id,
                    "fiche_evaluation_id" => null,
                    "rapport_id"  => null,
                    "attestation_id" => null,
                ]);
            } elseif ($request->input('fileType') == 'attestation') {

                $attestationController = new attestationController();
                $attestation = $attestationController->store($request);

                $docFile->update([
                    "attestation_id"  => json_decode($attestation->getContent())->id,
                    "fiche_evaluation_id" => null,
                    "rapport_id"  => null,
                    "presentation_id" => null,
                ]);
            } elseif ($request->input('fileType') == 'ficheEvaluation') {


                $ficheEvaluationController = new ficheEvaluationController();
                $ficheEvaluation = $ficheEvaluationController->store($request);

                $docFile->update([
                    "fiche_evaluation_id" => json_decode($ficheEvaluation->getContent())->id,
                    "rapport_id" => null,
                    "attestation_id"  => null,
                    "presentation_id" => null,
                ]);
            } elseif ($request->input('fileType') == 'rapport') {

                $request->validate([
                    "rapportVersion" => "required|string"
                ]);

                $rapportController = new rapportController();
                $rapport = $rapportController->store($request);

                $docFile->update([
                    "rapport_id" => json_decode($rapport->getContent())->id,
                    "fiche_evaluation_id" => null,
                    "attestation_id"  => null,
                    "presentation_id" => null,
                ]);
            }

            
            $this->destroyAttachments($docFileCopy);
        }


        if ($request->hasFile('docFile')) {
            $request->validate([
                'docFile.*' => ['required', 'mimes:pdf', 'max:51200']
            ]); 
            
            $path = $this->handleUploadedFile($request->file('docFile'));

            Storage::delete($docFile->path);
            $docFile->update([
                "path" => $path,
            ]);
        }
        //return redirect()->route('documents.index')->with('success', 'document ajouté avec succès');
        return redirect()->route('documents.index')->with('success', 'le document  a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAttachments($docFile)
    {
        if ($docFile->presentation_id != null) {

            $presentationController = new presentationController();
            $presentationController->destroy($docFile->presentation_id);
            
        } elseif ($docFile->attestation_id != null) {

            $attestationController = new attestationController();
            $attestationController->destroy($docFile->attestation_id);
        } elseif ($docFile->fiche_evaluation_id != null) {

            $ficheEvaluationController = new ficheEvaluationController();
            $ficheEvaluationController->destroy($docFile->fiche_evaluation_id);
        } elseif ($docFile->rapport_id != null) {

            $rapportController = new rapportController();
            $rapportController->destroy($docFile->rapport_id);
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
        $docFile = docFile::where('id',$id)->first();
        $this->destroyAttachments($docFile);
        Storage::delete($docFile->path);
        $docFile->delete();
        return redirect()->route('documents.index')->with('success', 'le document a été supprimé');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  docFile  $docFile
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple($docFiles)
    {
        
            foreach ($docFiles as $docFile){
           
                $this->destroy($docFile->id);
            }
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDocFile($docFile)
    {  

        Storage::delete($docFile->path);
        $docFile->delete();
        return redirect()->route('documents.index')->with('success', 'le document a été supprimé');
    }
    
    public function getFiles(Request $request)
    {

       // dd($request->directory . '/' . $request->filename);
       if ( Storage::exists( $request->directory . '/' . $request->filename ) ) {
        // Send Download
        return Storage::response($request->directory . '/' . $request->filename);
    } else {
        // Error
        exit( 'Requested file does not exist on our server!' );
    }
        
    }

    public function handleUploadedFile($files)
    {


        if (!is_null($files)) {
            foreach ($files as $file) {
                $path =  Storage::putFile('Docs', $file);
            }
        }
        return $path;
    }

    public function download($fileFolder = '' ,$filename = '' )
    {
        // Check if file exists in app/storage/file folder
        $file_path =  $fileFolder."/" . $filename;
        $headers = array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition: attachment; filename='.$filename,
        );

       //dd($file_path);

        if ( Storage::exists( $file_path ) ) {
            // Send Download
            return Storage::download( $file_path,$filename,$headers);
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }







    public function localgetFiles(Request $request)
    {


        return response()->file(Storage::path($request->directory . '/' . $request->filename),['content-type'=>'image']);
    }

   

    public function localdownload($fileFolder = '' ,$filename = '' )
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() . "/app/". $fileFolder."/" . $filename;
        $headers = array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition: attachment; filename='.$filename,
        );

        if ( file_exists( $file_path ) ) {
            // Send Download
            return response()->download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }
}

