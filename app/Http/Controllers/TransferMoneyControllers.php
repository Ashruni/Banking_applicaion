<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAmountDetail;
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
    public function store(Request $request,$id,$currentBalance)
    {
        $request->validate([
            'email'=>'required',
            'transfer'=>'required|numeric',
        ]);
        $userDetails=DB::table('users')->where('id',$id)->first();
        $userEmail=$userDetails->email;

        $email=DB::table('users')->where('email',$request->email)->exists();
        $emailValue=DB::table('users')->where('email',$request->email)->first();
        if($email && $emailValue->email != $userEmail )
        {
            $transferAmount=(int)$request->transfer;
            $amount = $currentBalance-$transferAmount;
            // DD($amount);
            if($amount>0)
            {

                UserAmountDetail::create([
                    'email'=>$request->email,
                    'transfer'=>$request->transfer,
                    'uid'=>$id
                     ]);
                     return "success";
            }
            else
            {
                return "insufficient balance";
            }

        }
        else
        {
            return "User Do not exist";
        }

    }
    // DD($userEmail);

            // $amount=100;
     // DD($emailValue->email);
     // $currentBalanceInteger = $currentBalance;
        // DD($emailValue->email != $userEmail );
        // DD($email && $emailValue->email != $userEmail );

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
