<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deposit;
use App\Http\Requests\DepositRequest;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getDepositData()
    {
        return Deposit::with('User')->where('user_id', auth()->id())->latest()->get();
    }
    public function DepositDashboard()
    {
        return Deposit::selectRaw('sum(amount) as totalAmount, count(*) as totalDeposits')->where('user_id', auth()->id())->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepositRequest $request)
    {
        $dep = Deposit::create([
            'user_id' => auth()->id(),
            'amount' => request('amount')
        ]);

        return $dep;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepositRequest $request, $id)
    {
        Deposit::findOrFail($id)
            ->update([
            'user_id' => auth()->id(),
            'amount' => request('amount')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deposit::findOrFail($id)->delete();
    }
}
