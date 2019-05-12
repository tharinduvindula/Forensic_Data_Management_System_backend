<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class multiuserhandle extends Controller
{
public static $list;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' =>['userprofilehandle','removefromuserprofilehandle']]);
    }

    public function userprofilehandle(Request $request){
            $items = DB::table('userprofilehandle')
            ->where('userprofileemail','=',request(['email']))
             ->select('userprofileemail')
             ->pluck('userprofileemail')
             ->first();
        if ($items== $request->get('email')){
            return response()->json(['error' => $items,'it is editing by someone'], 401);
        }
        else{
            DB::table('userprofilehandle')->insert(
                   ['userprofileemail' => $request->get('email')]);
            return response()->json(['message' => $items]);
        }
    }

    public function recodehandle(Request $request){
        return "tharindu";
    }
    public function removefromuserprofilehandle(Request $request){
        DB::table('userprofilehandle')->where('userprofileemail','=',request(['email']))->delete();
        return response()->json(['message' => 'sucses']);

    }


}



