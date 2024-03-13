<?php

namespace App\Http\Controllers;
use App\Models\UserAmountDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawingControllers extends Controller
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
    public function store(Request $request,$id,$currentBalance)
    {
        $request->validate([
            'withdraw'=>'required'
        ]);
        $withdrawAmount= (int)$request->withdraw;
        $withdrawalAmount = $currentBalance -$withdrawAmount;
        // DD( $withdrawalAmount );
        if($withdrawalAmount>=0){
            UserAmountDetails::create(
                [
                    'withdraw'=>$request->withdraw,
                    'uid'=>$id
                ]
                );
                return view('success');

        }
        else{
            return 'Insufficient Balance';
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
