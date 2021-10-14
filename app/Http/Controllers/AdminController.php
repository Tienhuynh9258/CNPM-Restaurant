<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\FoodCategory;

use DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function saveFoods(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
            $isExistID = Food::where('ID', $request->id)->exists();
            if(!$isExistID)
                Food::update([
                    'FNAME' => $request->fname,
                    'PRICE' => $request->price,
                    'INGREDIENTS' =>$request->ingredients,
                    'IMAGE_URL' => $request->image_url,
                    'STOCK_QUANTITY' => $request->stock_quantity
            ]);
            else {
                Food::insert([
                    'ID' => $request->id,
                    'FNAME' => $request->fname,
                    'PRICE' => $request->price,
                    'INGREDIENTS' =>$request->ingredients,
                    'IMAGE_URL' => $request->image_url,
                    'STOCK_QUANTITY' => $request->stock_quantity
                ]);
            }  
            
            Food_Category::insert([
                'FID' =>  $request->id,
                'CATEGORY' => $request->category
            ]);
            DB::commit();
            return response()->json(['status' => 1]);
        }catch(\Exception$e){
            DB::rollBack();
            \Log::info($e);
            return response()->json(['status' => 0]);
        }
    }
    public function deleteFoods(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
            DB::statement('delete from food where id =?',[$request->id]);
            DB::statement('delete from food_category where id =?',[$request->id]);
            DB::commit();
            return response()->json(['status' => 1]);
        }catch(\Exception$e){
            DB::rollBack();
            \Log::info($e);
            return response()->json(['status' => 0]);
        }
    }
    public function saveEmployees(Request $request){
        DB::beginTransaction();
        try{
            // Code 
            DB::commit();
            return response()->json(['status' => 1]);}
        catch(\Exception$e){
            \Log::info($e);
            DB::rollBack();
            return response()->json(['status' => 0]);
        }
    }

    public function getReveneu_InRange(Request $request){
        return DB::select('call getReveneu_InRange(?,?)', [$request->from_time, $request->next_time]);
    }
    
}
