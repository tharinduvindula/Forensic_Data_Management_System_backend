<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class deceased extends Controller
{
    function addpolice(Request $request){
        DB::table('police')->insert([
        "srjno" => $request->input('srjno'),
    	"policefullname" => $request->input('policefullname'),
        "policetagno" => $request->input('policetag'),
        "policearea" => $request->input('policearea'),
    	"policerank" => $request->input('policerank'),
    	"poliecphoneno" => $request->input('policephoneno'),
    	"policescenephoto" => $request->input('policescenephoto'),
    	"policefoldername" => $request->input('policefoldername'),



        ]);


    }

    function addcoroner(Request $request){
    DB::table('coroner')->insert([
            "srjno" => $request->input('srjno'),
            "coronerfullname" => $request->input('coronerfullname'),
            "coronerarea" => $request->input('coronerarea'),
            "coronerordergivenby" => $request->input('coronerordergivenby'),



            ]);
    }

    function adddeceased(Request $request){
    DB::table('deceased')->insert([
            "srjno" => $request->input('srjno'),
            "pmdate" => $request->input('pmdate'),
            "pmtime" => $request->input('pmtime'),
            "fullname" => $request->input('fullname'),
            "age" => $request->input('age'),
            "sex" => $request->input('sex'),
            "address" => $request->input('address'),
            "contactnumber" => $request->input('contactnumber'),



            ]);
    }

    public function getalldeceased(){

        $records =DB::table('deceased')
            ->select('srjno','fullname' )
            ->get();
    if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
        return response()->json($records);

    }
}
