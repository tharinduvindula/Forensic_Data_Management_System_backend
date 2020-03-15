<?php
namespace App\Http\Controllers;

use Carbon\Carbon;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class deceased extends Controller
{
    function adddeceased(Request $request){
        $exists = DB::table('add_deceased')->where('srjno','=',request(['srjno']))->first();
        if($exists){
            return response()->json(['error' => 'SRJ no already exists'], 401);
        }
        try{
                $records =DB::table('add_deceased')->insert([
                    "srjno" => $request->input('srjno'),
                    "pmdate" => $request->input('pmdate'),
                    "pmtime" => $request->input('pmtime'),
                    "fullname" => $request->input('fullname'),
                    "age" => $request->input('age'),
                    "sex" => $request->input('sex'),
                    "address" => $request->input('address'),
                    "contactnumber" => $request->input('contactnumber'),
                    "policefullname" => $request->input('policefullname'),
                    "policetag" => $request->input('policetagno'),
                    "policearea" => $request->input('policearea'),
                    "policerank" => $request->input('policerank'),
                    "policephoneno" => $request->input('policephoneno'),
                    "policescenephoto" => $request->input('policescenephoto'),
                    "policefoldername" => $request->input('policefoldername'),
                    "coronerfullname" => $request->input('coronerfullname'),
                    "coronerarea" => $request->input('coronerarea'),
                    "coronerordergivenby" => $request->input('coronerordergivenby'),
                    "a"=>$request->input('a'),
                    "b"=>$request->input('b'),
                    "c"=>$request->input('c'),
                    "contributory_cause"=>$request->input('contributory_cause'),
                    "other_comments"=>$request->input('other_comments'),
                    "cod"=>$request->input('cod'),
                    "circumstances"=>$request->input('circumstances'),
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
                    "addingby" => $request->input('addingby'),
                    "lasteditby" => $request->input('lasteditby'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                    ]);

                    $exists = DB::table('ga')->where('ctnumber','=',request(['gactnumber']))->first();
                    if($exists){
                        return response()->json(['error' => 'ga ct'], 401);
                    }

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
                                ]);
                                
                                $exists = DB::table('mri')->where('refnumber','=',request(['mrirefnum']))->first();
                                if($exists){
                                    return response()->json(['error' => 'mri ref'], 401);
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
                                            ]);

                                            $exists = DB::table('other')->where('refnumber','=',request(['otherrefnum']))->first();
                                            if($exists){
                                                return response()->json(['error' => 'other ref'], 401);
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
                                                        ]);
        }
        catch (\Throwable $e){
            //return response()->json(['error' => 'Oops something went wrong!'], 401);
            return response()->json(['error' => $e->getMessage()], 401);

        }
        if($records==null){
            return response()->json(['error' => 'something wrong'], 401);
        }
        return response()->json(["message"=>"success"]);
     }

    public function getalldeceased(){
        try{
            $records =DB::table('add_deceased')
                ->select('srjno','fullname','addingby','lasteditby' )
                ->where('add_deceased.active','=',1)
                ->get();
        }catch(\Throwable $e){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        if($records==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        return response()->json($records);

    }

    public function getdeceased(Request $request){
        try{
            $records =DB::table('add_deceased')
                ->select('add_deceased.srjno','add_deceased.fullname', 'add_deceased.pmdate', 'add_deceased.pmtime', 'add_deceased.age', 'add_deceased.sex', 'add_deceased.address', 'add_deceased.contactnumber',
                'add_deceased.policefullname', 'add_deceased.policetag', 'add_deceased.policearea', 'add_deceased.policescenephoto', 'add_deceased.policefoldername',
                'add_deceased.coronerordergivenby', 'add_deceased.coronerfullname', 'add_deceased.coronerarea',
                'add_deceased.a', 'add_deceased.b', 'add_deceased.c', 'add_deceased.contributory_cause', 'add_deceased.other_comments', 'add_deceased.cod', 'add_deceased.circumstances',
                'add_deceased.gactnumber', 'add_deceased.gadate', 'add_deceased.gatime', 'add_deceased.mrirefnum', 'add_deceased.mridate', 'add_deceased.mritime', 'add_deceased.otherrefnum', 'add_deceased.otherdate', 'add_deceased.othertime')
                ->where([['add_deceased.srjno','=',request(['srjno'])],['add_deceased.active','=',1]])
                ->first();
        }catch(\Throwable $e){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        if($records==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        try{
            $records1 =DB::table('add_deceased')
                ->join('ga', 'add_deceased.gactnumber', '=', 'ga.ctnumber')
                ->where([['add_deceased.srjno','=',request(['srjno'])],['add_deceased.active','=',1]])
                ->first();
        }catch(\Throwable $e){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        if($records1==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        $list = array();
        if($records1->blood==1)
            array_push($list, 'Blood');
        if($records1->medicine==1)
            array_push($list, 'Tablets/Medicines');
        if($records1->stomachcontents==1)
            array_push($list, 'Stomach Contents');
        if($records1->liver==1)
            array_push($list, 'Liver');
        if($records1->suspectedpoison==1)
            array_push($list, 'Suspected Poison');
        if($records1->urine==1)
            array_push($list, 'Urine');
        if($records1->kidney==1)
            array_push($list, 'Kidney');
        if($records1->bile==1)
            array_push($list, 'Bile');
        if($records1->lungs==1)
            array_push($list, 'Lungs');
        if($records1->other==1)
            array_push($list, 'Other (Specify)');
        if($records1->vitreoushumor==1)
            array_push($list, 'Vitreous humor');
        if($records1->intestinalcontents==1)
            array_push($list, 'Intestinal Contents');
        if($records1->brain==1)
            array_push($list, 'Brain');
        $records->gaspecimens=$list;
        try{
            $records1 =DB::table('add_deceased')
                ->join('mri', 'add_deceased.mrirefnum', '=', 'mri.refnumber')
                ->where([['add_deceased.srjno','=',request(['srjno'])],['add_deceased.active','=',1]])
                ->first();
        }catch(\Throwable $e){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        if($records1==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        $list = array();
        if($records1->blood==1)
            array_push($list, 'Blood');
        if($records1->medicine==1)
            array_push($list, 'Tablets/Medicines');
        if($records1->stomachcontents==1)
            array_push($list, 'Stomach Contents');
        if($records1->liver==1)
            array_push($list, 'Liver');
        if($records1->suspectedpoison==1)
            array_push($list, 'Suspected Poison');
        if($records1->urine==1)
            array_push($list, 'Urine');
        if($records1->kidney==1)
            array_push($list, 'Kidney');
        if($records1->bile==1)
            array_push($list, 'Bile');
        if($records1->lungs==1)
            array_push($list, 'Lungs');
        if($records1->other==1)
            array_push($list, 'Other (Specify)');
        if($records1->vitreoushumor==1)
            array_push($list, 'Vitreous humor');
        if($records1->intestinalcontents==1)
            array_push($list, 'Intestinal Contents');
        if($records1->brain==1)
            array_push($list, 'Brain');
        $records->mrispecimens=$list;
        try{
            $records1 =DB::table('add_deceased')
                ->join('other', 'add_deceased.otherrefnum', '=', 'other.refnumber')
                ->where([['add_deceased.srjno','=',request(['srjno'])],['add_deceased.active','=',1]])
                ->first();
        }catch(\Throwable $e){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        if($records1==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        $list = array();
        if($records1->blood==1)
            array_push($list, 'Blood');
        if($records1->medicine==1)
            array_push($list, 'Tablets/Medicines');
        if($records1->stomachcontents==1)
            array_push($list, 'Stomach Contents');
        if($records1->liver==1)
            array_push($list, 'Liver');
        if($records1->suspectedpoison==1)
            array_push($list, 'Suspected Poison');
        if($records1->urine==1)
            array_push($list, 'Urine');
        if($records1->kidney==1)
            array_push($list, 'Kidney');
        if($records1->bile==1)
            array_push($list, 'Bile');
        if($records1->lungs==1)
            array_push($list, 'Lungs');
        if($records1->other==1)
            array_push($list, 'Other (Specify)');
        if($records1->vitreoushumor==1)
            array_push($list, 'Vitreous humor');
        if($records1->intestinalcontents==1)
            array_push($list, 'Intestinal Contents');
        if($records1->brain==1)
            array_push($list, 'Brain');
        $records->otherspecimens=$list;

        return response()->json($records);

    }
    public function deletedeceased(Request $request){
        try{
            $records=DB::table('add_deceased')->updateOrInsert(
                [
                    'srjno' => $request->get('srjno'),
                    'active' => 1,
                ],
                [
                    'active' => 0,
                    'lasteditby' => $request->input('deleteby'),
                    'updated_at' => Carbon::now()
                ]);
        }catch(\Throwable $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
        if($records==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        return response()->json(["message"=>"success"]);

    }
}
