<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Food;

class FoodOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodinOrder = DB::table('foodin_order')
                    ->join('food_order','food_order.ID','=','foodin_order.ORDER_ID')
                    ->join('food','food.ID','=','foodin_order.FID')
                    ->select('foodin_order.*','food.FNAME','food.PRICE','food_order.TIPS')
                    ->get();
        $Order = DB::table('food_order')
                    ->select('food_order.*')
                    ->get();
        return view('RecvOrder', ['foodOrder' => $foodinOrder,'order' => $Order]);
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = DB::table('foodin_order')
                    ->join('food_order','food_order.ID','=','foodin_order.ORDER_ID')
                    ->join('food','food.ID','=','foodin_order.FID')
                    ->select('foodin_order.*','food.FNAME','food.PRICE','food_order.TIPS')
                    ->where('ORDER_ID',$id)
                    ->get();
        //dd($payment);
        return view('payment',['payment'=>$payment]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
