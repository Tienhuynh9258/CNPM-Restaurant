<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Carbon\Carbon;

use App\Models\Food;
use App\Models\FoodInOrder;
use App\Food_order;
use Carbon\Carbon as CarbonCarbon;

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
            'STATUS' => "Chưa thanh toán",
            'TOTAL' => $new,
            'TIPS' => $new,
            'created_at' => now(),
        ]);
        foreach ($request->id as $key => $number) {
            $desc = "No description";
            if(isset($request->descript[$key])){
                $desc = $request->descript[$key];
            }
            $cur_quantity = Food::where('ID',$number)->get();
            $tmp = $cur_quantity[0]->STOCK_QUANTITY - $request->quantity[$key];
            Food::where('ID',$number)->update(['STOCK_QUANTITY' => $tmp]);
            $price = DB::table('food')->select('food.PRICE')->where('food.ID',$number)->get();
            //dd($price);
            $new = $new + $price[0]->PRICE * $request->quantity[$key];
            DB::table('foodin_order')->insert([
                'FID' => $number,
                'ORDER_ID' => $food_order->ID,
                'QUANTITY' => $request->quantity[$key],
                'DESCRIPT' => $desc,
            ]);

            $food = DB::table('food')->select('food.*')->where('food.ID', $number)->first();
            $quantity = $food->STOCK_QUANTITY;
            $quantity -= $request->quantity[$key];
            $food = DB::table('food')->select('food.*')->where('food.ID', $number)->update([
                'STOCK_QUANTITY' => $quantity,
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

    public function getOrder()
    {
        $foodinOrder = DB::table('foodin_order')
                    ->join('food_orders','food_orders.ID','=','foodin_order.ORDER_ID')
                    ->join('food','food.ID','=','foodin_order.FID')
                    ->select('foodin_order.*','food.FNAME','food.IMAGE_URL','food.PRICE','food_orders.TIPS')
                    ->orderBy('foodin_order.ORDER_ID','ASC')
                    ->get();
        $Order = DB::table('food_orders')
                    ->select('food_orders.*')
                    ->orderBy('food_orders.STATUS', 'DESC')
                    ->orderBy('food_orders.updated_at','ASC')
                    ->get();
        return ['foodOrder' => $foodinOrder,'order' => $Order];
    }

    public function getRequest(Request $request)
    {
        $foodinOrder = DB::table('foodin_order')
                    ->join('food_orders','food_orders.ID','=','foodin_order.ORDER_ID')
                    ->join('food','food.ID','=','foodin_order.FID')
                    ->select('foodin_order.*','food.FNAME','food.IMAGE_URL','food.PRICE','food_orders.TIPS')
                    ->orderBy('foodin_order.ORDER_ID','ASC')
                    ->get();
        return $foodinOrder;
    }

    public function finish_order(Request $request)
    {
        $order = DB::table('food_orders')->select("*")->where('ID', $request->orderID)->update([
            'STATUS'=> "Đã nấu",
            'updated_at' => CarbonCarbon::now()
        ]);
    }

    public function doing_order(Request $request)
    {
        $order = DB::table('food_orders')->select("*")->where('ID', $request->orderID)->update([
            'STATUS'=> "Đang nấu",
            'updated_at' => CarbonCarbon::now()
        ]);
    }
    public function updateStatus($id){
        $order = DB::table('food_orders')->select("*")->where('ID', $id)->update([
            'STATUS'=> "Đã thanh toán",
            'updated_at' => CarbonCarbon::now()
        ]);
        return redirect(route('home'));
    }
    public function ForcedeleteOrder($id){
        $requests = FoodInOrder::where('ORDER_ID', $id)->get();
        foreach ($requests as $val) {
            $cur_quantity = Food::where('ID',$val->FID)->get();
            $tmp = $cur_quantity[0]->STOCK_QUANTITY + $val->QUANTITY;
            Food::where('ID',$val->FID)->update(['STOCK_QUANTITY' => $tmp]);
        }
        $order = Food_order::where('ID', $id)->delete();
        $requests = FoodInOrder::where('ORDER_ID', $id)->get();
        return redirect(route('home'));
    }
}
