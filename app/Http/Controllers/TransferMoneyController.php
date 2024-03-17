<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAmountDetail;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id,$currentBalance)
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

       return view('transfer',compact('name','id','user','currentBalance'));

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
        $transferMoney = $request->transfer;

        $email=DB::table('users')->where('email',$request->email)->exists();
        $emailValue=DB::table('users')->where('email',$request->email)->first();
        if($email && $emailValue->email != $userEmail )
        {
            $transferAmount=(int)$request->transfer;
            $amount = $currentBalance-$transferAmount;
            // DD($transferMoney);
            // DD($transferAmount);
            if($amount>=0 && $transferAmount>0)
            {

                UserAmountDetail::create([
                    'email'=>$request->email,
                    'transfer'=>$request->transfer,
                    'uid'=>$id
                     ]);
                     return redirect()->route('transfer_page', ['id' => $id,'currentBalance'=>$currentBalance])->with('success', 'Transferred Money successfully!');
            }
            else
            {
                return redirect()->route('transfer_page',['id' => $id,'currentBalance'=>$currentBalance])->with('warning','Something Went Wrong!');
            }

        }
        else
        {
            return redirect()->route('transfer_page',['id' => $id,'currentBalance'=>$currentBalance])->with('error','enter a valid user');
        }

    }
    // DD($userEmail);

            // $amount=100;
     // DD($emailValue->email);


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
