<?php

use App\Candidat;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('/index');
// });



Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {

    
    //users
    Route::get('utilisateurs', 'UserController@renderView')->name('utilisateurs.getView');
    Route::get('renderUsers', 'UserController@renderUsers')->name('getUsers');
    Route::get('renderUser', 'UserController@renderUser')->name('getUser');
    Route::post('storeUser', 'UserController@store')->name('addUser');
    Route::put('updateUser', 'UserController@update')->name('editUser');
    Route::delete('destroy', 'UserController@destroy')->name('deleteUser');
   


    Route::get('file_storage/{directory}/{filename}', 'docFilesController@getFiles')->name('getFiles');

    


    Route::resource('stages', 'stageController');
    Route::get('/stage/valide', 'stageController@valid')->name('stages.valid');
    Route::get('/stage/mesStages', 'stageController@encadrer')->name('stages.encadrer');
    Route::get('/stage/notes', 'stageController@notes')->name('stages.notes');
    Route::get('/stage/editNote/{id}', 'stageController@editNote')->name('stages.editNote');
    Route::put('/stage/noter/{id}', 'stageController@noter')->name('stages.noter');
    Route::resource('entreprises', 'entrepriseController');
    Route::resource('documents', 'docFilesController');
    Route::resource('admins', 'AdministrateurController');
    Route::resource('professeurs', 'ProfesseurController');
    Route::resource('etudiants', 'EtudiantController');
    Route::get('/etudiant/profile', 'EtudiantController@profile')->name('etudiants.profile');
    Route::get('/etudiant/sansRapport', 'EtudiantController@etudiantsSansRapp')->name('etudiants.sansRapp');
    Route::get('/etudiant/sansStage', 'EtudiantController@etudiantsSansStage')->name('etudiants.sansStage');
    Route::get('/etudiant/sansEncadrant', 'EtudiantController@etudiantsSansEncadr')->name('etudiants.sansEncadr');
    Route::get('/etudiant/parEncadrant', 'EtudiantController@etudiantsParProf')->name('etudiants.parProf');
    Route::get('/admin/profile', 'AdministrateurController@profile')->name('admins.profile');
    Route::get('/professeur/profile', 'ProfesseurController@profile')->name('professeurs.profile');
    Route::post('/professeur/encadrer-stage', 'ProfesseurController@encadrerStages')->name('professeurs.encadrerStages');
    Route::post('/professeur/retirer-stage', 'ProfesseurController@retirerStage')->name('professeurs.retirerStage');
    Route::post('/professeur/valider-stage', 'ProfesseurController@validerStage')->name('professeurs.validerStage');
    Route::post('/professeur/unvalider-stage', 'ProfesseurController@unvaliderStage')->name('professeurs.unvaliderStage');
    Route::get( '/download/{fileFolder}/{filename}', 'docFilesController@download');
    Route::get('pages-404', 'NazoxController@index');
    Route::any('/', 'HomeController@root');
    Route::any('/index', 'HomeController@root');
    //Route::get('{any}', 'HomeController@index');

    Route::get('/messages', 'MessageController@index')->name('messages');
    Route::get('/message/{id}', 'MessageController@show')->name('message');
    Route::post('message', 'MessageController@store')->name('messages.store');
    Route::get('support', 'AdministrateurController@support')->name('support');



});

Route::get('/landing-page', 'HomeController@landing');