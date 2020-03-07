<?php
namespace App\Http\Controllers;

use Carbon\Carbon;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class deceased extends Controller
{
    function addpolice(Request $request){
        $records =DB::table('police')->insert([
            "srjno" => $request->input('srjno'),
            "policefullname" => $request->input('policefullname'),
            "policetag" => $request->input('policetag'),
            "policearea" => $request->input('policearea'),
            "policerank" => $request->input('policerank'),
            "policephoneno" => $request->input('policephoneno'),
            "policescenephoto" => $request->input('policescenephoto'),
            "policefoldername" => $request->input('policefoldername'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);
        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }


    }

    function addcoroner(Request $request){
        $records =DB::table('coroner')->insert([
            "srjno" => $request->input('srjno'),
            "coronerfullname" => $request->input('coronerfullname'),
            "coronerarea" => $request->input('coronerarea'),
            "coronerordergivenby" => $request->input('coronerordergivenby'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);
        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
    }

    function adddeceased(Request $request){
        $records =DB::table('deceased')->insert([
            "srjno" => $request->input('srjno'),
            "pmdate" => $request->input('pmdate'),
            "pmtime" => $request->input('pmtime'),
            "fullname" => $request->input('fullname'),
            "age" => $request->input('age'),
            "sex" => $request->input('sex'),
            "address" => $request->input('address'),
            "contactnumber" => $request->input('contactnumber'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);
        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
    }
    function addcod(Request $request){
        $records =DB::table('cod')->insert([
                "srjno" => $request->input('srjno'),
                "a"=>$request->input('a'),
                "b"=>$request->input('b'),
                "c"=>$request->input('c'),
                "contributory_cause"=>$request->input('contributory_cause'),
                "other_comments"=>$request->input('other_comments'),
                "cod"=>$request->input('cod'),
                "circumstances"=>$request->input('circumstances'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
    }
    function addsamples(Request $request){        
            
            $records =DB::table('ga')->insert([
                "srjno" => $request->input('srjno'),
                "ctnumber" => $request->input('gactnumber'),
                "blood"=>$blood,
                "urine"=>$urine,
                "liver"=>$liver,
                "suspectedpoison"=>$suspectedpoison,
                "kidney"=>$kidney,
                "medicine"=>$medicine,
                "bile"=>$bile,
                "lungs"=>$lungs,
                "other"=>$other,
                "stomachcontents"=>$stomachcontents,
                "vitreoushumor"=>$vitreoushumor,
                "intestinalcontents"=>$intestinalcontents,
                "brain"=>$brain,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
            if($records==null){
                return response()->json(['error' => 'somthing wrong'], 401);
            }

        
        $records =DB::table('samples')->insert([
                "srjno" => $request->input('srjno'),
                "gactnumber" => $request->input('gactnumber'),
                "gaanalysis" => $request->input('gaanalysis'),
                "gadate" => $request->input('gadate'),
                "gatime" => $request->input('gatime'),
                "mrirefnum" => $request->input('mrirefnum'),
                "mrianalysis" => $request->input('mrianalysis'),
                "mridate" => $request->input('mridate'),
                "mritime" => $request->input('mritime'),
                "otherrefnum" => $request->input('otherrefnum'),
                "otheranalysis" => $request->input('otheranalysis'),
                "otherdate" => $request->input('otherdate'),
                "othertime" => $request->input('othertime'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);

            $gaspecimens=$request->input('gaspecimens');
            $blood=0;$liver=0;$suspectedpoison=0;$urine=0;$kidney=0;$medicine=0;$bile=0;$lungs=0;
            $other=0;$stomachcontents=0;$vitreoushumor=0;$intestinalcontents=0;$brain=0;
            foreach($gaspecimens as $gaspecimen){
                    if($gaspecimen=="Blood")
                        $blood=1;
                    elseif($gaspecimen=="Tablets/Medicines")
                        $medicine=1;
                    elseif($gaspecimen=="Stomach Contents")
                        $blood=1;
                    elseif($gaspecimen=="Liver")
                        $liver=1;
                    elseif($gaspecimen=="Suspected Poison")
                        $suspectedpoison=1;
                    elseif($gaspecimen=="Urine")
                        $urine=1;
                    elseif($gaspecimen=="Kidney")
                        $kidney=1;
                    elseif($gaspecimen=="Bile")
                        $bile=1;
                    elseif($gaspecimen=="Lungs")
                        $lungs=1;
                    elseif($gaspecimen=="Other (Specify)")
                        $other=1;
                    elseif($gaspecimen=="Vitreous humor")
                        $vitreoushumor=1;
                    elseif($gaspecimen=="Intestinal Contents")
                        $intestinalcontents=1;
                    elseif($gaspecimen=="Brain")
                        $brain=1;
            };
            $records =DB::table('ga')->insert([
                "srjno" => $request->input('srjno'),
                "ctnumber" => $request->input('gactnumber'),
                "blood"=>$blood,
                "urine"=>$urine,
                "liver"=>$liver,
                "suspectedpoison"=>$suspectedpoison,
                "kidney"=>$kidney,
                "medicine"=>$medicine,
                "bile"=>$bile,
                "lungs"=>$lungs,
                "other"=>$other,
                "stomachcontents"=>$stomachcontents,
                "vitreoushumor"=>$vitreoushumor,
                "intestinalcontents"=>$intestinalcontents,
                "brain"=>$brain,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
            if($records==null){
                return response()->json(['error' => 'somthing wrong'], 401);
            }

        
            $mrispecimens=$request->input('mrispecimens');
            $blood=0;$liver=0;$suspectedpoison=0;$urine=0;$kidney=0;$medicine=0;$bile=0;$lungs=0;
            $other=0;$stomachcontents=0;$vitreoushumor=0;$intestinalcontents=0;$brain=0;
            foreach($mrispecimens as $mrispecimen){
                    if($mrispecimen=="Blood")
                        $blood=1;
                    elseif($mrispecimen=="Tablets/Medicines")
                        $medicine=1;
                    elseif($mrispecimen=="Stomach Contents")
                        $blood=1;
                    elseif($mrispecimen=="Liver")
                        $liver=1;
                    elseif($mrispecimen=="Suspected Poison")
                        $suspectedpoison=1;
                    elseif($mrispecimen=="Urine")
                        $urine=1;
                    elseif($mrispecimen=="Kidney")
                        $kidney=1;
                    elseif($mrispecimen=="Bile")
                        $bile=1;
                    elseif($mrispecimen=="Lungs")
                        $lungs=1;
                    elseif($mrispecimen=="Other (Specify)")
                        $other=1;
                    elseif($mrispecimen=="Vitreous humor")
                        $vitreoushumor=1;
                    elseif($mrispecimen=="Intestinal Contents")
                        $intestinalcontents=1;
                    elseif($mrispecimen=="Brain")
                        $brain=1;
            };
            $records =DB::table('mri')->insert([
                "srjno" => $request->input('srjno'),
                "refnumber" => $request->input('mrirefnum'),
                "blood"=>$blood,
                "urine"=>$urine,
                "liver"=>$liver,
                "suspectedpoison"=>$suspectedpoison,
                "kidney"=>$kidney,
                "medicine"=>$medicine,
                "bile"=>$bile,
                "lungs"=>$lungs,
                "other"=>$other,
                "stomachcontents"=>$stomachcontents,
                "vitreoushumor"=>$vitreoushumor,
                "intestinalcontents"=>$intestinalcontents,
                "brain"=>$brain,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
            if($records==null){
                return response()->json(['error' => 'somthing wrong'], 401);
            }

        
            $otherspecimens=$request->input('otherspecimens');
            $blood=0;$liver=0;$suspectedpoison=0;$urine=0;$kidney=0;$medicine=0;$bile=0;$lungs=0;
            $other=0;$stomachcontents=0;$vitreoushumor=0;$intestinalcontents=0;$brain=0;
            foreach($otherspecimens as $otherspecimen){
                    if($otherspecimen=="Blood")
                        $blood=1;
                    elseif($otherspecimen=="Tablets/Medicines")
                        $medicine=1;
                    elseif($otherspecimen=="Stomach Contents")
                        $blood=1;
                    elseif($otherspecimen=="Liver")
                        $liver=1;
                    elseif($otherspecimen=="Suspected Poison")
                        $suspectedpoison=1;
                    elseif($otherspecimen=="Urine")
                        $urine=1;
                    elseif($otherspecimen=="Kidney")
                        $kidney=1;
                    elseif($otherspecimen=="Bile")
                        $bile=1;
                    elseif($otherspecimen=="Lungs")
                        $lungs=1;
                    elseif($otherspecimen=="Other (Specify)")
                        $other=1;
                    elseif($otherspecimen=="Vitreous humor")
                        $vitreoushumor=1;
                    elseif($otherspecimen=="Intestinal Contents")
                        $intestinalcontents=1;
                    elseif($otherspecimen=="Brain")
                        $brain=1;
            };
            $records =DB::table('other')->insert([
                "srjno" => $request->input('srjno'),
                "refnumber" => $request->input('otherrefnum'),
                "blood"=>$blood,
                "urine"=>$urine,
                "liver"=>$liver,
                "suspectedpoison"=>$suspectedpoison,
                "kidney"=>$kidney,
                "medicine"=>$medicine,
                "bile"=>$bile,
                "lungs"=>$lungs,
                "other"=>$other,
                "stomachcontents"=>$stomachcontents,
                "vitreoushumor"=>$vitreoushumor,
                "intestinalcontents"=>$intestinalcontents,
                "brain"=>$brain,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
            if($records==null){
                return response()->json(['error' => 'somthing wrong'], 401);
            }

        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }

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
