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
        /*DB::beginTransaction();
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
        }*/
    }
    public function remove_Food(Request $request){
        return DB::select('call removeFood(?)', [$request->id]);
    }
    public function remove_Chef(Request $request){
        return DB::select('call removeChef(?)', [$request->id]);
    }
    public function remove_Clerk(Request $request){
        return DB::select('call removeClerk(?)', [$request->id]);
    }
    public function get_upload_file_Employee(){
        return view("admin");
    }/*
    public function upload_file_Employee(Request $request){
        /*$file = $request->file('file_upload_employ');
        $file->move("images", $file->getClientOriginalName());
        $path = "images/" . $file->getClientOriginalName() . $file->getClientOriginalExtension();
        if($request->input("position") == "Nhân viên")
            DB::select('call addClerk("?", "?", "?", "?", "?", "?", "?")', [$request->input("CMND_employ"), $request->input("phone_employ"), $request->input("name_employ"), $request->input("CMND_employ"), $request->input("birthday_employ"), $request->input("phone_employ"), $path]);
        else DB::select('call addChef("?", "?", "?", "?", "?", "?", "?")', [$request->input("CMND_employ"), $request->input("phone_employ"), $request->input("name_employ"), $request->input("CMND_employ"), $request->input("birthday_employ"), $request->input("phone_employ"), $path]);

        return direction("location: localhost:8000/admin");
    }*/

    public function upload_file_Employee(Request $request){
        $file = $request->file('file_upload_employ');
        $file->move("images", $file->getClientOriginalName());
        $path = (string)"images/" . $file->getClientOriginalName();
        $str = "";
        if($request->input("position") == "Nhân viên") $str = 'clerk';
        else $str = 'chef';
        DB::table($str)->insert([
            'USERNAME' => $request->input("CMND_employ"),
            'PWD' => $request->input("phone_employ"),
            'CName' => $request->input("name_employ"),
            'CMND' => $request->input("CMND_employ"),
            'BIRTHDATE' => $request->input("birthday_employ"),
            'PHONE' => $request->input("phone_employ"),
            'IMG_URL' =>  $path
        ]);
        return redirect( route('admin'));
    }
    public function upload_file_Food(Request $request){
        $file = $request->file('file_upload_food');
        $file->move("images", $file->getClientOriginalName());
        $path = (string)"images/" . $file->getClientOriginalName();
        //return DB::select('call addFood(?, ?, ?, ?, ?, ?,?)', [$request->id, $request->fname, $request->price, $request->decs, $request->quantity, $request->file, $request->category]);
        //DB::select('call addFood(?, ?, ?, ?, ?, ?,?)', [$request->input("id"), $request->input("fname"), $request->input("price"), $request->input("decs"), $request->input("quantity"), $path, $request->input("category")]);
        //Food::create([])
        DB::table('food')->insert([
            'ID' => $request->input("id_food"),
            'FNAME' => $request->input("name_food"),
            'PRICE' => $request->input("price_food"),
            'INGREDIENTS' => $request->input("decs_food"),
            'STOCK_QUANTITY' => $request->input("number_food"),
            'IMAGE_URL' => $path
        ]);
        DB::table('food_category')->insert([
            'FID' =>  $request->input("id_food"),
            'CATEGORY' => $request->input("category_food")
        ]);
        //return redirect(route('admin'));
        return redirect( route('admin'));
    }
    /*
    public function upload_file_Food(Request $request){
        $file = $request->file('upload_file_Food');
        $file->move("images", $file->getClientOriginalName());
        $path = "images/" . $file->getClientOriginalName() . $file->getClientOriginalExtension();
        DB::select('call addFood(?, ?, ?, ?, ?, ?,?)', [$request->input('id_food'), $request->input('name_food'), $request->input('price_food'), $request->input('decs_food'), $request->input('number_food'), $path, $request->input('category_food')]);
        return view('admin');
        return response()->json(['status' => 2]);
    }*/
    public function update_Food(Request $request){
        //$file = $request->file('file');
        //$file->move("images", $file->getClientOriginalName());
        //$path = "images/" . $file->getClientOriginalName() . $file->getClientOriginalExtension();
        Food::where('ID',$request->id)->update(['FNAME' => $request->fname, "PRICE" => $request->price, "INGREDIENTS" => $request->decs]);
        return FoodCategory::where('FID',$request->id)->update(['CATEGORY' => $request->category]);
    }
    public function update_Clerk(Request $request){
        //$file = $request->file('file');
        //$file->move("images", $file->getClientOriginalName());
        //$path = "images/" . $file->getClientOriginalName() . $file->getClientOriginalExtension();
        return DB::select('call updateClerk(?, ?)', [$request->phone, $request->id]);
    }
    public function update_Chef(Request $request){
        //$file = $request->file('file');
        //$file->move("images", $file->getClientOriginalName());
        //$path = "images/" . $file->getClientOriginalName() . $file->getClientOriginalExtension();
        return DB::select('call updateChef(?, ?)', [$request->phone, $request->id]);
    }
    public function getReveneu_InRange(Request $request){
        return DB::select('call getReveneu_InRange(?,?)', [$request->from_time, $request->next_time]);
    }
    public function get_Food(Request $request){
        return DB::select('call getFood()');
    }
    public function get_Clerk(Request $request){
        return DB::select('call getClerk()');
    }
    public function get_Chef(Request $request){
        return DB::select('call getChef()');
    }
    public function get_Category(Request $request){
        return DB::select('call getCategory()');
    }
}
