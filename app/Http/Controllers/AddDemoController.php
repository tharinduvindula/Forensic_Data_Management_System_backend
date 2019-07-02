<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddDemoController extends Controller
{
    function addDemo(Request $request)
    {

        DB::table('users')->insert([
        "nic" => $request->input('nic'),
    	"fullname" => $request->input('fullname'),
        "firstname" => $request->input('firstname'),
        "lastname" => $request->input('lastname'),
    	"address" => $request->input('address'),
    	"telephone" => $request->input('telephone'),
    	"startdate" => $request->input('startdate'),
    	"email" => $request->input('email'),
        "password" => '###password',
        'permenetdisable' => 0,
        'temporydisable' => 0,
        'enddate' =>'',
        'loginaccess'  => 0,
        'photo'=>'',
        'passwordstate'=>0,
        'usertype'=>'demo',
        'addingby'=>$request->input('addingby'),
        'lasteditby'=>$request->input('addingby'),


        ]);


    	return 'Demonstrator record successfully created with NIC ' .$request->input('nic');
    }

    public function deletedemo(Request $request)
    {

        $user=DB::table('users')->updateOrInsert(
            [
                'email' => $request->get('email'),
            ],
            [
                'permenetdisable' => true,
                'lasteditby' => $request->get('lasteditby'),
                'enddate'=> date('Y-m-d H:i:s')
            ]

        );
        return response()->json($user);

    }

    public function getalldemo(){

        $records =DB::table('users')
            ->select('usertype','fullname', 'firstname','lastname','nic','sex','email','address','telephone','startdate','id','addingby','lasteditby'
            ,'temporydisable', 'permenetdisable','photo','passwordstate' )
            ->where('usertype','=', 'demo')
            ->get();
    if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
        return response()->json($records);

    }

    public function getdemo(Request $request){

        $records =DB::table('users')
            ->select('fullname', 'firstname','lastname','nic','email','address','telephone','startdate')
            ->where('email','=',request(['email']))
            ->first();
        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
        return response()->json($records);

    }

    public function updatedemo(Request $request)
    {

        $user=DB::table('users')->updateOrInsert(
            [
                'email' => $request->get('lastemail'),
            ],
            [
                'fullname' => $request->get('fullname'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'nic' => $request->get('nic'),
                'address' => $request->get('address'),
                'email' => $request->get('email'),
                'telephone' => $request->get('telephone'),
                'startdate' => $request->get('startdate'),
                'lasteditby' => $request->get('lasteditby')


            ]
        );
        return response()->json($user);

    }
}
