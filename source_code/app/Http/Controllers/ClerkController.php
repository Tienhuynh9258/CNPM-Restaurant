<?php

namespace App\Http\Controllers;

use App\Message;
use App\Food_order;
use App\Models\FoodInOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClerkController extends Controller
{
    public function index()
    {
        return view('clerk');
    }

    public function chat_box($id)
    {

        return view('chat.index');
        
    }

    public function sendMessage(Request $request)
    {
        // $request->validate([
        //     'message_input' => 'required',
        //     'userID' => 'required|integer'
        // ]);

        $message = Message::create([
            'message' => $request->message_input,
            'userID' => $request->userID,
            'created_at' => Carbon::now(),
            'userName' => $request->userName
        ]);
        // dd($message);
        // return response()->json(['success' =>'Added chat successfully.']);

        $today_date = Carbon::now();
        
        $messages = Message::whereDate("created_at", $today_date)->get();

        return $messages;
    }

    public function getMessage()
    {
        $today_date = Carbon::now();
        
        $messages = Message::whereDate("created_at", $today_date)->get();

        $output = "";

        return $messages;
    }

    public function getWaitingOrder()
    {
        $orders = Food_order::where('STATUS', "Chưa thanh toán")->orWhere('STATUS', 'Đã thanh toán')->orWhere('STATUS', "Chua thanh toan")->orderBy('food_orders.STATUS', 'DESC')->orderBy('food_orders.updated_at', 'ASC')->get();

        return $orders;
    }

    public function getPendingOrder()
    {
        $orders = Food_order::where('STATUS',"Chưa nấu")->orWhere('STATUS','Đang nấu')->orWhere('STATUS', 'Đã nấu ')->orderBy('food_orders.STATUS', 'ASC')->orderBy('food_orders.updated_at', 'ASC')->get();

        return $orders;
    }

    public function getOrderDetail(Request $request)
    {
        $order_id = $request->orderID;

        $foodinOrder = DB::table('foodin_order')
                        ->join('food_orders','food_orders.ID','=','foodin_order.ORDER_ID')
                        ->join('food','food.ID','=','foodin_order.FID')
                        ->select('foodin_order.*','food.FNAME','food.IMAGE_URL','food.PRICE','food_orders.TIPS')
                        ->where('food_orders.ID',$order_id)
                        ->orderBy('foodin_order.ORDER_ID','ASC')
                        ->get();
        $Order = DB::table('food_orders')
                ->select('food_orders.*')
                ->where('food_orders.ID',$order_id)
                ->orderBy('food_orders.ID','DESC')
                ->get();
        //dd(['foodOrder' => $foodinOrder,'order' => $Order]);
        return ['foodOrder' => $foodinOrder,'order' => $Order];
    }

    public function confirmOrder(Request $request)
    {
        $orderID = $request->orderID;
        $order = Food_order::where('ID', $orderID)->update([
            'STATUS'=> 'Chưa nấu',
            'updated_at' => Carbon::now()
        ]);
        return $order;
    }

    public function finishOrder(Request $request)
    {
        $orderID = $request->orderID;
        $order = Food_order::where('ID', $orderID)->update([
            'STATUS'=> 'Đã hoàn thành',
            'updated_at' => Carbon::now()
        ]);

        return $order;
    }

    public function deleteOrder(Request $request)
    {
        $orderID = $request->orderID;

        $test = FoodInOrder::where("ORDER_ID", $orderID)->get();

        foreach ($test as $key => $value){
            $food = DB::table('food')->select('food.*')->where('food.ID', $value->FID)->first();
            $quantity = $food->STOCK_QUANTITY;
            $quantity += $value->QUANTITY;
            $food = DB::table('food')->select('food.*')->where('food.ID', $value->FID)->update([
                'STOCK_QUANTITY' => $quantity,
            ]);
        }

        $order = Food_order::where('ID', $orderID)->delete();
        
        $requests = FoodInOrder::where("ORDER_ID", $orderID)->delete();

    }

    public function profile()
    {
        return view('clerk.profile');
    }
}
