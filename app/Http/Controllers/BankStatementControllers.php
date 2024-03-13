<?php

namespace App\Http\Controllers;
use DB;
use App\Models\UserAmountDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankStatementControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id,$currentBalance)
    {
        $userDetails= DB::table('users')->where('id',$id)->first();
        $email= $userDetails->email;
        // DD($email);
        $bankDetails= DB::table('user_amount_details')->where('uid', $id)->get();
        $bankDepositDetails= DB::table('user_amount_details')->where('email',$email)->get();
        // DD($bankDepositDetails);
        return view('bank-statement')->with('bankDetails', $bankDetails)->with('bankDepositDetails',$bankDepositDetails)->with('currentBalance',$currentBalance);
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
