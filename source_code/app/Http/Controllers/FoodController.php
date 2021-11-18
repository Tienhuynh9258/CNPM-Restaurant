<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function getAllFood(){
        $foods = Food::select('*')->paginate(20);
        //$foods = Food::select('*');
        return view('index', ['foods' => $foods]);
        
    }
    public function getAllByCategory(Request $request){
        return DB::select('call DSMon_Theloai(?)', [$request->category]);
    }

    public function getAllByPrice(Request $request){
        return DB::select('call DSMon_gia(?)', [$request->price]);
    }

    public function getAllByKey(Request $request){

        $food_search = Food::where('FNAME','like', '%'.$request->keyword.'%')->orWhere('INGREDIENTS', 'like','%'.$request->keyword.'%')->get();
        // return DB::select('call DSMon_tukhoa(?)', [$request->keyword]);
        return $food_search;
    }
    // public function payment(Request $request){
    //     DB::beginTransaction();
    //     // $arrBookInTrans = [];
    //     // $arrBookTrans = [];
    //     try{
    //         // foreach($request->books as $book){

    //         //     $arrBookInTrans[] = [
    //         //         'CID' => $book['cid'],
    //         //         'PURCHASED_DATE' => date('Y-m-d H:i:s'),
    //         //         'ISBN' => $book['isbn'],
    //         //         'QTY' => $book['total'],
    //         //         'TRANS_TYPE' => 'BUY'
    //         //     ];
    //         //     $arrBookTrans[] = [
    //         //         'CID' => $book['cid'],
    //         //         'PURCHASED_DATE' =>  date('Y-m-d H:i:s'),
    //         //         'TRANS_STATUS' => 'WAITING',
    //         //         'TOTAL' => $price
    //         //     ];
    //         // }
    //         // DB::table('book_in_transaction')->insert($arrBookInTrans);
    //         // DB::table('book_transaction')->insert($arrBookTrans);
    //         $isbn = str_pad($request->isbn, 14 - strlen(strval($request->isbn)), '0', STR_PAD_LEFT);
    //         $price = DB::table('book')->select('PRICE')->where('ISBN', $isbn)->first()->PRICE;
    //         DB::table('book_transaction')->insert([
    //             'ISBN' => $isbn,
    //             'CID' => $request->cid,
    //             'PURCHASED_DATE' =>  date('Y-m-d H:i:s'),
    //             'TRANS_STATUS' => 'WAITING',
    //             'TOTAL' => round($price * $request->total)
    //         ]);
    //         DB::table('book_in_transaction')->insert([
    //             'CID' => $request->cid,
    //             'PURCHASED_DATE' => date('Y-m-d H:i:s'),
    //             'ISBN' => $isbn,
    //             'QTY' => $request->total,
    //             'TRANS_TYPE' => 'BUY'
    //         ]);
    //         DB::commit();
    //         return response()->json(['status' => 1]);
    //     }catch(\Exception $e){
    //         \Log::info($e);
    //         DB::rollBack();
    //         return response()->json(['status' => 0]);
    //     }
    // }
    public function index()
    {
        $food = DB::table('food')
                ->select('food.*')->get();
        return view('updatefood',['food' => $food]);
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
        Food::where('ID',$id)->update(['STOCK_QUANTITY' => $request->input('STOCK_QUANTITY')]);
        return redirect(route('food.index'));
    }

}
