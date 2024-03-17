<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class RegistrationContentProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registration');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $hashedPassword = Hash::make($request->password);
        $userExist=DB::table('users')->where('email',$request->email)->exists();
        if(!$userExist){
            $users = User::create(
                [
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>$hashedPassword
                ]
            );
            return view('login-page');

        }
        else{
            return "Duplicate mail id is not possible";
        }






    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
