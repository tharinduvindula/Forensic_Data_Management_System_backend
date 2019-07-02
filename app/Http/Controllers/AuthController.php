<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdduserRequest;
use App\User;
use DB;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' =>['adduser','login','updateuser','getalluser','getuser','deleteuser','temporydisable','defaultpassword']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        $items = DB::table('users')
             ->select('usertype','fullname', 'firstname','lastname','nic','sex','email','address','telephone','startdate','addingby','lasteditby','photo')
             ->where('email','=',request(['email']))
             ->first();
        $loginaccess = DB::table('users')
            ->where('email','=',request(['email']))
             ->select('loginaccess')
             ->pluck('loginaccess')
             ->first();
        $permenetdiseble = DB::table('users')
             ->where('email','=',request(['email']))
             ->select('permenetdisable')
             ->pluck('permenetdisable')
             ->first();
        $temporydisable = DB::table('users')
             ->where('email','=',request(['email']))
             ->select('temporydisable')
             ->pluck('temporydisable')
             ->first();

        if (!$token = auth()->claims(['ud' => $items])->attempt($credentials)) {
            return response()->json(['error' => 'Email or password does\'t exist'], 401);
        }
        if($loginaccess==0){
            return response()->json(['error' => 'your Email not verified please verify your email'], 401);
        }
        if($permenetdiseble==1){
            return response()->json(['error' => 'your Account is remove from system '], 401);
        }
        if($temporydisable==1){
            return response()->json(['error' => 'your Account is tempory disable '], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'user' => $token
            //'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function adduser(Request $request)
    {
        $user=User::create($request->all());
        return response()->json($user);
    }

    public function getalluser(){

        $records =DB::table('users')
            ->select('usertype','fullname', 'firstname','lastname','nic','sex','email','address','telephone','startdate','enddate','id','addingby','lasteditby'
            ,'temporydisable', 'permenetdisable','photo','passwordstate' )
            ->orderBy('usertype', 'Desc')
            ->get();
    if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
        return response()->json($records);

    }
    public function getuser(Request $request){

        $records =DB::table('users')
            ->select('usertype','fullname', 'firstname','lastname','nic','sex','email','address','telephone','startdate','addingby','lasteditby','photo')
            ->where('email','=',request(['email']))
            ->first();
        if($records==null){
            return response()->json(['error' => 'somthing wrong'], 401);
        }
        return response()->json($records);

    }

    public function deleteuser(Request $request)
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

    public function temporydisable(Request $request)
    {
      $user=DB::table('users')->updateOrInsert(
            [
                'email' => $request->get('email'),
            ],
            [
                'temporydisable' => $request->input('temporydisable')
            ]

        );
        return response()->json($user);

    }

    public function defaultpassword(Request $request)
    {
       $user = User::whereEmail($request->email)->first();
        $user->update(['password'=>'uosj@123']);
        $user->update(['passwordstate'=>0]);
        return response()->json($user);

    }


    public function updateuser(Request $request)
    {

        $user=DB::table('users')->updateOrInsert(
            [
                'email' => $request->get('oldemail'),
            ],
            [
                'fullname' => $request->get('fullname'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'address' => $request->get('address'),
                'nic' => $request->get('nic'),
                'sex' => $request->get('sex'),
                'email' => $request->get('email'),
                'telephone' => $request->get('telephone'),
                'lasteditby' => $request->get('lasteditby'),
                'photo' => $request->get('photo'),
                'usertype' => $request->get('usertype'),



            ]
        );
        return response()->json($user);

    }

}
