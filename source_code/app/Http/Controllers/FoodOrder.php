<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Carbon\Carbon;

use App\Models\Food;
use App\Models\FoodInOrder;
use App\Food_order;



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
                    ->join('food_orders','food_orders.ID','=','foodin_order.ORDER_ID')
                    ->join('food','food.ID','=','foodin_order.FID')
                    ->select('foodin_order.*','food.FNAME','food.IMAGE_URL','food.PRICE','food_orders.TIPS')
                    ->orderBy('foodin_order.ORDER_ID','ASC')
                    ->get();
        $Order = DB::table('food_orders')
                    ->select('food_orders.*')
                    ->orderBy('food_orders.ID','DESC')
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
        $new = 0;
        $food_order = Food_order::create([
            'STATUS' => "Chua thanh toan",
            'TOTAL' => $new,
            'TIPS' => $new,
            'created_at' => now(),
        ]);
        foreach ($request->id as $key => $number) {
            $desc = "No description";
            if(isset($request->descript[$key])){
                $desc = $request->descript[$key];
            }
            $price = DB::table('food')->select('food.PRICE')->where('food.ID',$number)->get();
            //dd($price);
            $new = $new + $price[0]->PRICE * $request->quantity[$key];
            DB::table('foodin_order')->insert([
                'FID' => $number,
                'ORDER_ID' => $food_order->ID,
                'QUANTITY' => $request->quantity[$key],
                'DESCRIPT' => $desc,
            ]);
        }
        Food_order::where('ID',$food_order->ID)->update(['TOTAL' => $new]);
        return redirect()->route("food-order.show", $food_order->ID);
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
                    ->join('food_orders','food_orders.ID','=','foodin_order.ORDER_ID')
                    ->join('food','food.ID','=','foodin_order.FID')
                    ->select('foodin_order.*','food.FNAME','food.PRICE','food_orders.TIPS','food_orders.TOTAL')
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
        $tips = Food_order::select('*')->where('ID',$id)->get();
        $tips[0]->TIPS;
        Food_order::where('ID',$id)->update(['TIPS' => $request->input('tips'),
                                            'TOTAL' => $tips[0]->TOTAL - $tips[0]->TIPS + $request->input('tips')]);
        return redirect(route('food-order.show',$id));
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
    public function setTips(Request $request){
        //dd($request);
        $id = $request->id;
        $tips = Food_order::select('*')->where('ID',$id)->get();
        $tips[0]->TIPS;
        //dd($tips);
        Food_order::where('ID',$id)->update(['TIPS' => $request->tips,
                                            'TOTAL' => $tips[0]->TOTAL - $tips[0]->TIPS + $request->tips]);
        $food = Food_order::select('*')->where('ID',$id)->get();
        return $food;
    }
  
}
