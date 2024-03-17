<?php

namespace App\Http\Controllers;
use App\Models\UserAmountDetail;
use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositedPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $user = DB::table('users')->where('id', $id)->first();
        $email=$user->email;

       $details = User::where('email',$email)->first();
       $ids=$details->id;
       $name=$details->name;
       $email=$details->email;

       $deposit = DB::table('user_amount_details')->where('uid',$ids)->sum('deposit');
       $withdrawal= DB::table('user_amount_details')->where('uid',$ids)->sum('withdraw');
       $transferDeposit = DB::table('user_amount_details')->where('email',$email)->sum('transfer');
       $transferWithdraw = DB::table('user_amount_details')->where('uid',$ids)->whereNotNull('email')->sum('transfer');
       $sumDeposits= $deposit + $transferDeposit ;
       $sumWithdraw= $withdrawal + $transferWithdraw;
       $currentBalance= $sumDeposits -$sumWithdraw;

       $name=$user->name;
       $user =auth()->user();
        //   DD($ids);

       return view('deposit-view',compact('name','ids','user','currentBalance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $request->validate(
            [
            'deposit'=>'required',
            ]
        );
        $deposits = $request->deposit;
        if($deposits>0){
            UserAmountDetail::create([
                'deposit'=>$request['deposit'],
                'uid'=>$id
            ]);
            return redirect()->route('deposit_page', ['id' => $id])->with('success', 'Deposit successful!');
        }
        else{
            return redirect()->route('deposit_page', ['id' => $id])->with('error', 'Deposit unsuccessful! Minimum deposit amount is of ₹1');
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
