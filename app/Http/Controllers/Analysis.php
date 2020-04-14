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
    try{
        $selects = DB::table('add_deceased')
        ->select(DB::raw(' `gadate` - `pmdate` AS  Diff'))
        ->where('address', '=', request(['area']))
        ->get();

        $count1=0; $count2=0; $count3=0; $count4=0; $count5=0; $count6=0; $count7=0;

        foreach($selects as $select){
            $x=$select->Diff;
            if($x > 1095)
                $count1=$count1+1;
            elseif(1095 >= $x and $x > 365)
                $count2=$count2+1;
            elseif(365 >= $x and $x > 90)
                $count3=$count3+1;
            elseif(90 >= $x and $x > 30)
                $count4=$count4+1;
            elseif(30 >= $x and $x > 7)
                $count5=$count5+1;
            elseif(7 >= $x and $x > 1)
                $count6=$count6+1;
            elseif($x = 1)
                $count7=$count7+1;
        };

        $delay = [
            $count1,
            $count2,
            $count3,
            $count4,
            $count5,
            $count6,
            $count7
        ];

    }

    catch (\Throwable $e){
        return response()->json(['error' => $e->getMessage()], 401);
    }

    return response()->json($delay);
}

public function PMReportDelays(Request $request){
    try{
        $selects = DB::table('add_deceased')
        ->select(DB::raw(' `mridate` - `pmdate` AS  Diff,`otherdate` - `pmdate` AS  Diff2'))
        ->where('address', '=', request(['area']))
        ->get();

        $count1=0; $count2=0; $count3=0; $count4=0; $count5=0; $count6=0; $count7=0;

        foreach($selects as $select){
            $x=$select->Diff;
            $y=$select->Diff2;
            if($x > 1095)
                $count1=$count1+1;
            elseif(1095 >= $x and $x > 365)
                $count2=$count2+1;
            elseif(365 >= $x and $x > 90)
                $count3=$count3+1;
            elseif(90 >= $x and $x > 30)
                $count4=$count4+1;
            elseif(30 >= $x and $x > 7)
                $count5=$count5+1;
            elseif(7 >= $x and $x > 1)
                $count6=$count6+1;
            elseif($x = 1)
                $count7=$count7+1;

            if($y > 1095)
                $count1=$count1+1;
            elseif(1095 >= $y and $y > 365)
                $count2=$count2+1;
            elseif(365 >= $y and $y > 90)
                $count3=$count3+1;
            elseif(90 >= $y and $y > 30)
                $count4=$count4+1;
            elseif(30 >= $y and $y > 7)
                $count5=$count5+1;
            elseif(7 >= $y and $y > 1)
                $count6=$count6+1;
            elseif($y = 1)
                $count7=$count7+1;
        };

        $delay = [
            $count1,
            $count2,
            $count3,
            $count4,
            $count5,
            $count6,
            $count7
        ];

    }

    catch (\Throwable $e){
        return response()->json(['error' => $e->getMessage()], 401);
    }

    return response()->json($delay);
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

    return response()->json($count);
}

public function PoliceReportDelays(Request $request){

    try{
        $selects = DB::table('add_deceased')
        ->select(DB::raw(' `policedate` - `pmdate` AS  Diff'))
        ->where('address', '=', request(['area']))
        ->get();

        $count1=0; $count2=0; $count3=0; $count4=0; $count5=0; $count6=0; $count7=0;

        foreach($selects as $select){
            $x=$select->Diff;
            if($x > 1095)
                $count1=$count1+1;
            elseif(1095 >= $x and $x > 365)
                $count2=$count2+1;
            elseif(365 >= $x and $x > 90)
                $count3=$count3+1;
            elseif(90 >= $x and $x > 30)
                $count4=$count4+1;
            elseif(30 >= $x and $x > 7)
                $count5=$count5+1;
            elseif(7 >= $x and $x > 1)
                $count6=$count6+1;
            elseif($x = 1)
                $count7=$count7+1;
        };

        $delay = [
            $count1,
            $count2,
            $count3,
            $count4,
            $count5,
            $count6,
            $count7
        ];

    }

    catch (\Throwable $e){
        return response()->json(['error' => $e->getMessage()], 401);
    }

    return response()->json($delay);

}


}
