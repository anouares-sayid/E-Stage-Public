<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function renderView()
    {
        return view('manageUsers.index');
    }

    public function renderUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::All();

            return Datatables::of($users)
                ->addColumn('name', function ($row) {
                    return $row->firstname . ' ' . $row->lastname;
                })

                ->rawColumns([''])
                ->make(true);
        }
    }

    public function renderUser(Request $request)
    {
        if ($request->ajax()) {

            $user = User::find($request->id);

            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
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
        if ($request->ajax()) {
            $validator = Validator::make($request->all(),[
                'lastname' => ['required', 'string', 'max:255'],
                'firstname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            
            if($validator->fails()){

                return  response()->json(['errors' => $validator->errors()->toArray()], 500);

            }else {
            $user = User::create([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->ajax()) {

            if ($request->password){
                /*
           * Validate all input fields
           */
          $fields = $request->validate([
                'lastname' => ['string', 'max:255'],
                'firstname' => ['string', 'max:255'],
                'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $request->userid,],
                'password' => ['string', 'min:8', 'confirmed'],
          ]);

            $user = User::where('id', $request->userid)->firstOrFail();
            $user->update([
                'firstname' => $fields['firstname'],
                'lastname' => $fields['lastname'],
                'email' => $fields['email'],
                'password' => Hash::make($fields['password']),
            ]);
            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
        }
            $fields = $request->validate([
                'lastname' => ['string', 'max:255'],
                'firstname' => ['string', 'max:255'],
                'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $request->userid,],
                ]);

            $user = User::where('id', $request->userid)->firstOrFail();
            $user->update([
                'firstname' => $fields['firstname'],
                'lastname' => $fields['lastname'],
                'email' => $fields['email'],
                 ]);


            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::findOrFail($request->userid)->delete();

        return "success";
    }
}
