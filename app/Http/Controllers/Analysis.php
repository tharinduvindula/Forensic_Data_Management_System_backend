<?php
namespace App\Http\Controllers;

use Carbon\Carbon;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Analysis extends Controller
{

public function GAReportDelays(Request $request){
    return response()->json(['success' => 'whohooo'], 200);
}

public function OrderGivenCount(Request $request){

    try{

        $coroner = DB::table('add_deceased')
        ->where([['address', '=', request(['area'])], ['coronerordergivenby', '=', 'Coroner']])
        ->count();

        $magistrate = DB::table('add_deceased')
        ->where([['address', '=', request(['area'])], ['coronerordergivenby', '=', 'Magistrate']])
        ->count();


        $count = [
            $coroner,
            $magistrate
        ];
    }

    catch (\Throwable $e){
        return response()->json(['error' => $e->getMessage()], 401);
    }

    // return response()->json($coroner);
    // return response()->json($magistrate);
    // return response()->json($request);
    return response()->json($count);
}

}
