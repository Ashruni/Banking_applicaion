<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAmountDetails;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferMoneyControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request,$id=9)
    {
        $request->validate([
            'email'=>'required',
            'transfer'=>'required',
        ]);
        $email=DB::table('users')->where('email',$request->email)->exists();
        if($email){
            UserAmountDetails::create(
                [
                'email'=>$request->email,
                'transfer'=>$request->transfer,
                'uid'=>$id
            ]
        );
            return "success";

        }
        else{
            return "something went wrong";
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
