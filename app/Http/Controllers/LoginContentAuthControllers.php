<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginContentAuthControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Auth::attempt($request);
        $validated=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $email= $request->email;
        $details = User::where('email',$email)->first();

        if($details){
            if(Auth::attempt($request->only('email', 'password'))){
                // $user =auth()->user();

                $name=$details->name;
                $email=$details->email;
                return view('user-dashboard')->with('name',$name)->with('email',$email);
            }
            else{
                return 'Something went wrong';
            }

        }

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
        //
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
