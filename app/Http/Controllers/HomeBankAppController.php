<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\UserAmountDetail;

class HomeBankAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
       $email=$user->email;
       $details = User::where('email',$email)->first();

       $id=$details->id;
       $name=$details->name;
       $email=$details->email;
       $deposit = DB::table('user_amount_details')->where('uid',$id)->sum('deposit');

       $withdrawal= DB::table('user_amount_details')->where('uid',$id)->sum('withdraw');
       $transferDeposit = DB::table('user_amount_details')->where('email',$email)->sum('transfer');
       $transferWithdraw = DB::table('user_amount_details')->where('uid',$id)->whereNotNull('email')->sum('transfer');
       $sumDeposits= $deposit + $transferDeposit ;
       $sumWithdraw= $withdrawal + $transferWithdraw;
       $currentBalance= $sumDeposits -$sumWithdraw;

       $name=$user->name;
       $user =auth()->user();


       return view('user-dashboard',compact('name','id','user','currentBalance','email'));
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
