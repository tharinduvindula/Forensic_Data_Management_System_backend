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

            $gaspecimens=$request->input('gaspecimens');
            $gablood=0;$galiver=0;$gasuspectedpoison=0;$gaurine=0;$gakidney=0;$gamedicine=0;$gabile=0;$galungs=0;
            $gaother=0;$gastomachcontents=0;$gavitreoushumor=0;$gaintestinalcontents=0;$gabrain=0;
            foreach($gaspecimens as $gaspecimen){
                if($gaspecimen=="Blood")
                    $gablood=1;
                elseif($gaspecimen=="Tablets/Medicines")
                    $gamedicine=1;
                elseif($gaspecimen=="Stomach Contents")
                    $gablood=1;
                elseif($gaspecimen=="Liver")
                    $galiver=1;
                elseif($gaspecimen=="Suspected Poison")
                    $gasuspectedpoison=1;
                elseif($gaspecimen=="Urine")
                    $gaurine=1;
                elseif($gaspecimen=="Kidney")
                    $gakidney=1;
                elseif($gaspecimen=="Bile")
                    $gabile=1;
                elseif($gaspecimen=="Lungs")
                    $galungs=1;
                elseif($gaspecimen=="Other (Specify)")
                    $gaother=1;
                elseif($gaspecimen=="Vitreous humor")
                    $gavitreoushumor=1;
                elseif($gaspecimen=="Intestinal Contents")
                    $gaintestinalcontents=1;
                elseif($gaspecimen=="Brain")
                    $gabrain=1;
            };

            $mrispecimens=$request->input('mrispecimens');
            $mriblood=0;$mriliver=0;$mrisuspectedpoison=0;$mriurine=0;$mrikidney=0;$mrimedicine=0;$mribile=0;$mrilungs=0;
            $mriother=0;$mristomachcontents=0;$mrivitreoushumor=0;$mriintestinalcontents=0;$mribrain=0;
            foreach($mrispecimens as $mrispecimen){
                if($mrispecimen=="Blood")
                    $mriblood=1;
                elseif($mrispecimen=="Tablets/Medicines")
                    $mrimedicine=1;
                elseif($mrispecimen=="Stomach Contents")
                    $mriblood=1;
                elseif($mrispecimen=="Liver")
                    $mriliver=1;
                elseif($mrispecimen=="Suspected Poison")
                    $mrisuspectedpoison=1;
                elseif($mrispecimen=="Urine")
                    $mriurine=1;
                elseif($mrispecimen=="Kidney")
                    $mrikidney=1;
                elseif($mrispecimen=="Bile")
                    $mribile=1;
                elseif($mrispecimen=="Lungs")
                    $mrilungs=1;
                elseif($mrispecimen=="Other (Specify)")
                    $mriother=1;
                elseif($mrispecimen=="Vitreous humor")
                    $mrivitreoushumor=1;
                elseif($mrispecimen=="Intestinal Contents")
                    $mriintestinalcontents=1;
                elseif($mrispecimen=="Brain")
                    $mribrain=1;
            };

            $otherspecimens=$request->input('otherspecimens');
            $otherblood=0;$otherliver=0;$othersuspectedpoison=0;$otherurine=0;$otherkidney=0;$othermedicine=0;$otherbile=0;$otherlungs=0;
            $otherother=0;$otherstomachcontents=0;$othervitreoushumor=0;$otherintestinalcontents=0;$otherbrain=0;
            foreach($otherspecimens as $otherspecimen){
                if($otherspecimen=="Blood")
                    $otherblood=1;
                elseif($otherspecimen=="Tablets/Medicines")
                    $othermedicine=1;
                elseif($otherspecimen=="Stomach Contents")
                    $otherblood=1;
                elseif($otherspecimen=="Liver")
                    $otherliver=1;
                elseif($otherspecimen=="Suspected Poison")
                    $othersuspectedpoison=1;
                elseif($otherspecimen=="Urine")
                    $otherurine=1;
                elseif($otherspecimen=="Kidney")
                    $otherkidney=1;
                elseif($otherspecimen=="Bile")
                    $otherbile=1;
                elseif($otherspecimen=="Lungs")
                    $otherlungs=1;
                elseif($otherspecimen=="Other (Specify)")
                    $otherother=1;
                elseif($otherspecimen=="Vitreous humor")
                    $othervitreoushumor=1;
                elseif($otherspecimen=="Intestinal Contents")
                    $otherintestinalcontents=1;
                elseif($otherspecimen=="Brain")
                    $otherbrain=1;
            };

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
                "policedate" => $request->input('policedate'),
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
                "gaanalysis" => $request->input('gaanalysis'),
                "mrirefnum" => $request->input('mrirefnum'),
                "mrianalysis" => $request->input('mrianalysis'),
                "mridate" => $request->input('mridate'),
                "mritime" => $request->input('mritime'),
                "mrianalysis" => $request->input('mrianalysis'),
                "otherrefnum" => $request->input('otherrefnum'),
                "otheranalysis" => $request->input('otheranalysis'),
                "otherdate" => $request->input('otherdate'),
                "othertime" => $request->input('othertime'),
                "otheranalysis" => $request->input('otheranalysis'),
                "gablood"=>$gablood,
                "galiver"=>$galiver,
                "gasuspectedpoison"=>$gasuspectedpoison,
                "gaurine"=>$gaurine,
                "gakidney"=>$gakidney,
                "gamedicine"=>$gamedicine,
                "gabile"=>$gabile,
                "galungs"=>$galungs,
                "gaother"=>$gaother,
                "gastomachcontents"=>$gastomachcontents,
                "gavitreoushumor"=>$gavitreoushumor,
                "gaintestinalcontents"=>$gaintestinalcontents,
                "gabrain"=>$gabrain,
                "mriblood"=>$mriblood,
                "mriliver"=>$mriliver,
                "mrisuspectedpoison"=>$mrisuspectedpoison,
                "mriurine"=>$mriurine,
                "mrikidney"=>$mrikidney,
                "mrimedicine"=>$mrimedicine,
                "mribile"=>$mribile,
                "mrilungs"=>$mrilungs,
                "mriother"=>$mriother,
                "mristomachcontents"=>$mristomachcontents,
                "mrivitreoushumor"=>$mrivitreoushumor,
                "mriintestinalcontents"=>$mriintestinalcontents,
                "mribrain"=>$mribrain,
                "otherblood"=>$otherblood,
                "otherliver"=>$otherliver,
                "othersuspectedpoison"=>$othersuspectedpoison,
                "otherurine"=>$otherurine,
                "otherkidney"=>$otherkidney,
                "othermedicine"=>$othermedicine,
                "otherbile"=>$otherbile,
                "otherlungs"=>$otherlungs,
                "otherother"=>$otherother,
                "otherstomachcontents"=>$otherstomachcontents,
                "othervitreoushumor"=>$othervitreoushumor,
                "otherintestinalcontents"=>$otherintestinalcontents,
                "otherbrain"=>$otherbrain,
                "addingby" => $request->input('addingby'),
                "lasteditby" => $request->input('lasteditby'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
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

    public function addtohistory(Request $request){
        try{
            $exists = DB::table('history')->where('srjno','=',request(['srjno']))->first();
            if($exists){
                return response()->json(['error' => 'SRJ no already exists'], 401);
            }else{
                $gaspecimens=$request->input('gaspecimens');
                $gablood=0;$galiver=0;$gasuspectedpoison=0;$gaurine=0;$gakidney=0;$gamedicine=0;$gabile=0;$galungs=0;
                $gaother=0;$gastomachcontents=0;$gavitreoushumor=0;$gaintestinalcontents=0;$gabrain=0;
                foreach($gaspecimens as $gaspecimen){
                    if($gaspecimen=="Blood")
                        $gablood=1;
                    elseif($gaspecimen=="Tablets/Medicines")
                        $gamedicine=1;
                    elseif($gaspecimen=="Stomach Contents")
                        $gablood=1;
                    elseif($gaspecimen=="Liver")
                        $galiver=1;
                    elseif($gaspecimen=="Suspected Poison")
                        $gasuspectedpoison=1;
                    elseif($gaspecimen=="Urine")
                        $gaurine=1;
                    elseif($gaspecimen=="Kidney")
                        $gakidney=1;
                    elseif($gaspecimen=="Bile")
                        $gabile=1;
                    elseif($gaspecimen=="Lungs")
                        $galungs=1;
                    elseif($gaspecimen=="Other (Specify)")
                        $gaother=1;
                    elseif($gaspecimen=="Vitreous humor")
                        $gavitreoushumor=1;
                    elseif($gaspecimen=="Intestinal Contents")
                        $gaintestinalcontents=1;
                    elseif($gaspecimen=="Brain")
                        $gabrain=1;
                };

                $mrispecimens=$request->input('mrispecimens');
                $mriblood=0;$mriliver=0;$mrisuspectedpoison=0;$mriurine=0;$mrikidney=0;$mrimedicine=0;$mribile=0;$mrilungs=0;
                $mriother=0;$mristomachcontents=0;$mrivitreoushumor=0;$mriintestinalcontents=0;$mribrain=0;
                foreach($mrispecimens as $mrispecimen){
                    if($mrispecimen=="Blood")
                        $mriblood=1;
                    elseif($mrispecimen=="Tablets/Medicines")
                        $mrimedicine=1;
                    elseif($mrispecimen=="Stomach Contents")
                        $mriblood=1;
                    elseif($mrispecimen=="Liver")
                        $mriliver=1;
                    elseif($mrispecimen=="Suspected Poison")
                        $mrisuspectedpoison=1;
                    elseif($mrispecimen=="Urine")
                        $mriurine=1;
                    elseif($mrispecimen=="Kidney")
                        $mrikidney=1;
                    elseif($mrispecimen=="Bile")
                        $mribile=1;
                    elseif($mrispecimen=="Lungs")
                        $mrilungs=1;
                    elseif($mrispecimen=="Other (Specify)")
                        $mriother=1;
                    elseif($mrispecimen=="Vitreous humor")
                        $mrivitreoushumor=1;
                    elseif($mrispecimen=="Intestinal Contents")
                        $mriintestinalcontents=1;
                    elseif($mrispecimen=="Brain")
                        $mribrain=1;
                };

                $otherspecimens=$request->input('otherspecimens');
                $otherblood=0;$otherliver=0;$othersuspectedpoison=0;$otherurine=0;$otherkidney=0;$othermedicine=0;$otherbile=0;$otherlungs=0;
                $otherother=0;$otherstomachcontents=0;$othervitreoushumor=0;$otherintestinalcontents=0;$otherbrain=0;
                foreach($otherspecimens as $otherspecimen){
                    if($otherspecimen=="Blood")
                        $otherblood=1;
                    elseif($otherspecimen=="Tablets/Medicines")
                        $othermedicine=1;
                    elseif($otherspecimen=="Stomach Contents")
                        $otherblood=1;
                    elseif($otherspecimen=="Liver")
                        $otherliver=1;
                    elseif($otherspecimen=="Suspected Poison")
                        $othersuspectedpoison=1;
                    elseif($otherspecimen=="Urine")
                        $otherurine=1;
                    elseif($otherspecimen=="Kidney")
                        $otherkidney=1;
                    elseif($otherspecimen=="Bile")
                        $otherbile=1;
                    elseif($otherspecimen=="Lungs")
                        $otherlungs=1;
                    elseif($otherspecimen=="Other (Specify)")
                        $otherother=1;
                    elseif($otherspecimen=="Vitreous humor")
                        $othervitreoushumor=1;
                    elseif($otherspecimen=="Intestinal Contents")
                        $otherintestinalcontents=1;
                    elseif($otherspecimen=="Brain")
                        $otherbrain=1;
                };

                $records =DB::table('history')->insert([
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
                    "policedate" => $request->input('policedate'),
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
                    "gaanalysis" => $request->input('gaanalysis'),
                    "mrirefnum" => $request->input('mrirefnum'),
                    "mrianalysis" => $request->input('mrianalysis'),
                    "mridate" => $request->input('mridate'),
                    "mritime" => $request->input('mritime'),
                    "mrianalysis" => $request->input('mrianalysis'),
                    "otherrefnum" => $request->input('otherrefnum'),
                    "otheranalysis" => $request->input('otheranalysis'),
                    "otherdate" => $request->input('otherdate'),
                    "othertime" => $request->input('othertime'),
                    "otheranalysis" => $request->input('otheranalysis'),
                    "gablood"=>$gablood,
                    "galiver"=>$galiver,
                    "gasuspectedpoison"=>$gasuspectedpoison,
                    "gaurine"=>$gaurine,
                    "gakidney"=>$gakidney,
                    "gamedicine"=>$gamedicine,
                    "gabile"=>$gabile,
                    "galungs"=>$galungs,
                    "gaother"=>$gaother,
                    "gastomachcontents"=>$gastomachcontents,
                    "gavitreoushumor"=>$gavitreoushumor,
                    "gaintestinalcontents"=>$gaintestinalcontents,
                    "gabrain"=>$gabrain,
                    "mriblood"=>$mriblood,
                    "mriliver"=>$mriliver,
                    "mrisuspectedpoison"=>$mrisuspectedpoison,
                    "mriurine"=>$mriurine,
                    "mrikidney"=>$mrikidney,
                    "mrimedicine"=>$mrimedicine,
                    "mribile"=>$mribile,
                    "mrilungs"=>$mrilungs,
                    "mriother"=>$mriother,
                    "mristomachcontents"=>$mristomachcontents,
                    "mrivitreoushumor"=>$mrivitreoushumor,
                    "mriintestinalcontents"=>$mriintestinalcontents,
                    "mribrain"=>$mribrain,
                    "otherblood"=>$otherblood,
                    "otherliver"=>$otherliver,
                    "othersuspectedpoison"=>$othersuspectedpoison,
                    "otherurine"=>$otherurine,
                    "otherkidney"=>$otherkidney,
                    "othermedicine"=>$othermedicine,
                    "otherbile"=>$otherbile,
                    "otherlungs"=>$otherlungs,
                    "otherother"=>$otherother,
                    "otherstomachcontents"=>$otherstomachcontents,
                    "othervitreoushumor"=>$othervitreoushumor,
                    "otherintestinalcontents"=>$otherintestinalcontents,
                    "otherbrain"=>$otherbrain,
                    'updated_at' => Carbon::now(),                  

                ]);

            }

        }catch (\Throwable $e){
            return response()->json(['error' => $e->getMessage()], 401);

        }
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
                ->where([['add_deceased.srjno','=',request(['srjno'])],['add_deceased.active','=',1]])
                ->first();
        }catch(\Throwable $e){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        if($records==null){
            return response()->json(['error' => 'Oops something went wrong!'], 401);
        }
        
        $list = array();
        if($records->gablood==1)
            array_push($list, 'Blood');
        if($records->gamedicine==1)
            array_push($list, 'Tablets/Medicines');
        if($records->gastomachcontents==1)
            array_push($list, 'Stomach Contents');
        if($records->galiver==1)
            array_push($list, 'Liver');
        if($records->gasuspectedpoison==1)
            array_push($list, 'Suspected Poison');
        if($records->gaurine==1)
            array_push($list, 'Urine');
        if($records->gakidney==1)
            array_push($list, 'Kidney');
        if($records->gabile==1)
            array_push($list, 'Bile');
        if($records->galungs==1)
            array_push($list, 'Lungs');
        if($records->gaother==1)
            array_push($list, 'Other (Specify)');
        if($records->gavitreoushumor==1)
            array_push($list, 'Vitreous humor');
        if($records->gaintestinalcontents==1)
            array_push($list, 'Intestinal Contents');
        if($records->gabrain==1)
            array_push($list, 'Brain');
        $records->gaspecimens=$list;
        
        $list = array();
        if($records->mriblood==1)
            array_push($list, 'Blood');
        if($records->mrimedicine==1)
            array_push($list, 'Tablets/Medicines');
        if($records->mristomachcontents==1)
            array_push($list, 'Stomach Contents');
        if($records->mriliver==1)
            array_push($list, 'Liver');
        if($records->mrisuspectedpoison==1)
            array_push($list, 'Suspected Poison');
        if($records->mriurine==1)
            array_push($list, 'Urine');
        if($records->mrikidney==1)
            array_push($list, 'Kidney');
        if($records->mribile==1)
            array_push($list, 'Bile');
        if($records->mrilungs==1)
            array_push($list, 'Lungs');
        if($records->mriother==1)
            array_push($list, 'Other (Specify)');
        if($records->mrivitreoushumor==1)
            array_push($list, 'Vitreous humor');
        if($records->mriintestinalcontents==1)
            array_push($list, 'Intestinal Contents');
        if($records->mribrain==1)
            array_push($list, 'Brain');
        $records->mrispecimens=$list;
       
        $list = array();
        if($records->otherblood==1)
            array_push($list, 'Blood');
        if($records->othermedicine==1)
            array_push($list, 'Tablets/Medicines');
        if($records->otherstomachcontents==1)
            array_push($list, 'Stomach Contents');
        if($records->otherliver==1)
            array_push($list, 'Liver');
        if($records->othersuspectedpoison==1)
            array_push($list, 'Suspected Poison');
        if($records->otherurine==1)
            array_push($list, 'Urine');
        if($records->otherkidney==1)
            array_push($list, 'Kidney');
        if($records->otherbile==1)
            array_push($list, 'Bile');
        if($records->otherlungs==1)
            array_push($list, 'Lungs');
        if($records->otherother==1)
            array_push($list, 'Other (Specify)');
        if($records->othervitreoushumor==1)
            array_push($list, 'Vitreous humor');
        if($records->otherintestinalcontents==1)
            array_push($list, 'Intestinal Contents');
        if($records->otherbrain==1)
            array_push($list, 'Brain');
        $records->otherotherspecimens=$list;

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

    public function updatedeceased(Request $request){

        try{
            $gaspecimens=$request->input('gaspecimens');
                $gablood=0;$galiver=0;$gasuspectedpoison=0;$gaurine=0;$gakidney=0;$gamedicine=0;$gabile=0;$galungs=0;
                $gaother=0;$gastomachcontents=0;$gavitreoushumor=0;$gaintestinalcontents=0;$gabrain=0;
                foreach($gaspecimens as $gaspecimen){
                    if($gaspecimen=="Blood")
                        $gablood=1;
                    elseif($gaspecimen=="Tablets/Medicines")
                        $gamedicine=1;
                    elseif($gaspecimen=="Stomach Contents")
                        $gablood=1;
                    elseif($gaspecimen=="Liver")
                        $galiver=1;
                    elseif($gaspecimen=="Suspected Poison")
                        $gasuspectedpoison=1;
                    elseif($gaspecimen=="Urine")
                        $gaurine=1;
                    elseif($gaspecimen=="Kidney")
                        $gakidney=1;
                    elseif($gaspecimen=="Bile")
                        $gabile=1;
                    elseif($gaspecimen=="Lungs")
                        $galungs=1;
                    elseif($gaspecimen=="Other (Specify)")
                        $gaother=1;
                    elseif($gaspecimen=="Vitreous humor")
                        $gavitreoushumor=1;
                    elseif($gaspecimen=="Intestinal Contents")
                        $gaintestinalcontents=1;
                    elseif($gaspecimen=="Brain")
                        $gabrain=1;
                };

            $mrispecimens=$request->input('mrispecimens');
            $mriblood=0;$mriliver=0;$mrisuspectedpoison=0;$mriurine=0;$mrikidney=0;$mrimedicine=0;$mribile=0;$mrilungs=0;
            $mriother=0;$mristomachcontents=0;$mrivitreoushumor=0;$mriintestinalcontents=0;$mribrain=0;
            foreach($mrispecimens as $mrispecimen){
                if($mrispecimen=="Blood")
                    $mriblood=1;
                elseif($mrispecimen=="Tablets/Medicines")
                    $mrimedicine=1;
                elseif($mrispecimen=="Stomach Contents")
                    $mriblood=1;
                elseif($mrispecimen=="Liver")
                    $mriliver=1;
                elseif($mrispecimen=="Suspected Poison")
                    $mrisuspectedpoison=1;
                elseif($mrispecimen=="Urine")
                    $mriurine=1;
                elseif($mrispecimen=="Kidney")
                    $mrikidney=1;
                elseif($mrispecimen=="Bile")
                    $mribile=1;
                elseif($mrispecimen=="Lungs")
                    $mrilungs=1;
                elseif($mrispecimen=="Other (Specify)")
                    $mriother=1;
                elseif($mrispecimen=="Vitreous humor")
                    $mrivitreoushumor=1;
                elseif($mrispecimen=="Intestinal Contents")
                    $mriintestinalcontents=1;
                elseif($mrispecimen=="Brain")
                    $mribrain=1;
            };

            $otherspecimens=$request->input('otherspecimens');
                $otherblood=0;$otherliver=0;$othersuspectedpoison=0;$otherurine=0;$otherkidney=0;$othermedicine=0;$otherbile=0;$otherlungs=0;
                $otherother=0;$otherstomachcontents=0;$othervitreoushumor=0;$otherintestinalcontents=0;$otherbrain=0;
                foreach($otherspecimens as $otherspecimen){
                    if($otherspecimen=="Blood")
                        $otherblood=1;
                    elseif($otherspecimen=="Tablets/Medicines")
                        $othermedicine=1;
                    elseif($otherspecimen=="Stomach Contents")
                        $otherblood=1;
                    elseif($otherspecimen=="Liver")
                        $otherliver=1;
                    elseif($otherspecimen=="Suspected Poison")
                        $othersuspectedpoison=1;
                    elseif($otherspecimen=="Urine")
                        $otherurine=1;
                    elseif($otherspecimen=="Kidney")
                        $otherkidney=1;
                    elseif($otherspecimen=="Bile")
                        $otherbile=1;
                    elseif($otherspecimen=="Lungs")
                        $otherlungs=1;
                    elseif($otherspecimen=="Other (Specify)")
                        $otherother=1;
                    elseif($otherspecimen=="Vitreous humor")
                        $othervitreoushumor=1;
                    elseif($otherspecimen=="Intestinal Contents")
                        $otherintestinalcontents=1;
                    elseif($otherspecimen=="Brain")
                        $otherbrain=1;
                };

            $records =DB::table('add_deceased')
            ->where('srjno',request(['srjno']))
            ->update([
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
                "policedate" => $request->input('policedate'),
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
                "gaanalysis" => $request->input('gaanalysis'),
                "gadate" => $request->input('gadate'),
                "gatime" => $request->input('gatime'),
                "gaanalysis" => $request->input('gaanalysis'),
                "mrianalysis" => $request->input('mrianalysis'),
                "mridate" => $request->input('mridate'),
                "mritime" => $request->input('mritime'),
                "mrianalysis" => $request->input('mrianalysis'),
                "otheranalysis" => $request->input('otheranalysis'),
                "otherdate" => $request->input('otherdate'),
                "othertime" => $request->input('othertime'),
                "otheranalysis" => $request->input('otheranalysis'),
                "gablood"=>$gablood,
                "galiver"=>$galiver,
                "gasuspectedpoison"=>$gasuspectedpoison,
                "gaurine"=>$gaurine,
                "gakidney"=>$gakidney,
                "gamedicine"=>$gamedicine,
                "gabile"=>$gabile,
                "galungs"=>$galungs,
                "gaother"=>$gaother,
                "gastomachcontents"=>$gastomachcontents,
                "gavitreoushumor"=>$gavitreoushumor,
                "gaintestinalcontents"=>$gaintestinalcontents,
                "gabrain"=>$gabrain,
                "mriblood"=>$mriblood,
                "mriliver"=>$mriliver,
                "mrisuspectedpoison"=>$mrisuspectedpoison,
                "mriurine"=>$mriurine,
                "mrikidney"=>$mrikidney,
                "mrimedicine"=>$mrimedicine,
                "mribile"=>$mribile,
                "mrilungs"=>$mrilungs,
                "mriother"=>$mriother,
                "mristomachcontents"=>$mristomachcontents,
                "mrivitreoushumor"=>$mrivitreoushumor,
                "mriintestinalcontents"=>$mriintestinalcontents,
                "mribrain"=>$mribrain,
                "otherblood"=>$otherblood,
                "otherliver"=>$otherliver,
                "othersuspectedpoison"=>$othersuspectedpoison,
                "otherurine"=>$otherurine,
                "otherkidney"=>$otherkidney,
                "othermedicine"=>$othermedicine,
                "otherbile"=>$otherbile,
                "otherlungs"=>$otherlungs,
                "otherother"=>$otherother,
                "otherstomachcontents"=>$otherstomachcontents,
                "othervitreoushumor"=>$othervitreoushumor,
                "otherintestinalcontents"=>$otherintestinalcontents,
                "otherbrain"=>$otherbrain,
                "lasteditby" => $request->input('lasteditby'),
                'updated_at' => Carbon::now()
                ]);
            }
            catch (\Throwable $e){
                //return response()->json(['error' => 'Oops something went wrong!'], 401);
                return response()->json(['error' => $e->getMessage()], 401);

            }
            return response()->json(["message"=>"success"]);

    }


}
