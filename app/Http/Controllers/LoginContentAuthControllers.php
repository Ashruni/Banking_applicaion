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
        $emailExist = User::where('email',$email)->exists();
        $details = User::where('email',$email)->first();

        if($emailExist){
            if(Auth::attempt($request->only('email', 'password'))){
                $user =auth()->user();
                // $sessionData = session()->all();
                $id=$details->id;
                $name=$details->name;
                $email=$details->email;

                $deposit = DB::table('user_amount_details')->where('uid',$id)->sum('deposit');
                $withdrawal= DB::table('user_amount_details')->where('uid',$id)->sum('withdraw');
                $transferDeposit = DB::table('user_amount_details')->where('email',$request->email)->sum('transfer');
                $transferWithdraw = DB::table('user_amount_details')->where('uid',$id)->whereNotNull('email')->sum('transfer');

                $sumDeposits= $deposit + $transferDeposit ;
                $sumWithdraw= $withdrawal + $transferWithdraw;
                $currentBalance= $sumDeposits -$sumWithdraw;
                return view('user-dashboard',compact('name','id','email','user','currentBalance'));

            }
            else{
                return 'Something went wrong';
            }

        }
        else{
            return 'User does not exist';
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
