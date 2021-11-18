<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd($request->all());
        //$hashed=Hash::make($request->pwd);
        //echo $hashed;
        if($request->usr == 'admin' && $request->pwd == 'admin')
            return response()->json(['status' => 2]);
        $chef = DB::table('chef')->where('USERNAME', $request->usr)->first();
        //console.log($chef);
        if($chef && Hash::check($request->pwd, $chef->PWD)){
            //console.log(1);
            $request->session()->put('cid', $chef->ID);
            $request->session()->put('uname', $request->usr);
            $request->session()->put('cus_name', $chef->CNAME);
            $request->session()->put('staff_type', 'chef');
            return response()->json(['status' => 1, 'data' => $chef]);
        }    
        $clerk = DB::table('clerk')->where('USERNAME', $request->usr)->first();
        if($clerk && Hash::check($request->pwd, $clerk->PWD)){
            $request->session()->put('cid', $clerk->ID);
            $request->session()->put('uname', $request->usr);
            $request->session()->put('cus_name', $clerk->CNAME);
            $request->session()->put('staff_type', 'clerk');
            return response()->json(['status' => 3, 'data' => $clerk]);
        }
        
        return response()->json(['status' => 0]);
    }

    // public function register(Request $request){
    //     $checkExist = Customer::where('USERNAME', $request->uname)->exists();
    //     if($checkExist)
    //         return response()->json(['status' => -1]);
    //     $total = Customer::count() + 1;
    //     $idLength = strlen(strval($total));
    //     $id = 'C' . str_pad(strval($total), 8 - $idLength, '0', STR_PAD_LEFT);
    //     $status = Customer::insert([
    //         'ID' => $id,
    //         'USERNAME' => $request->uname,
    //         'PWD' => Hash::make($request->pass),
    //         'PHONE' => $request->phone,
    //         'EMAIL' => $request->email,
    //         'FNAME' => $request->fname,
    //         'LNAME' => $request->lname,
    //     ]);
    //     if($status)
    //         return response()->json(['status' => 1]);
    //     return response()->json(['status' => 0]);
    // }

    public function logout(Request $request){
        $request->session()->forget('uname');
        $request->session()->forget('cus_name');
        return response()->json(['status' => 1]);
    }
}
