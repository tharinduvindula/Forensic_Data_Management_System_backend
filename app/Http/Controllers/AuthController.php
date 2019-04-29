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
        $this->middleware('auth:api', ['except' =>['adduser','login','updateuser']]);
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
             ->select('usertype','fullname', 'firstname','lastname','nic','sex','email','address','telephone','startdate')
             ->where('email','=',request(['email']))
             ->first();

        if (!$token = auth()->claims(['ud' => $items])->attempt($credentials)) {
            return response()->json(['error' => 'Email or password does\'t exist'], 401);
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
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function adduser(Request $request)
    {
        User::create($request->all());

    }

    public function updateuser(Request $request)
    {
        /*$result=DB::table('users')
            ->where('email', request(['oldemail']))
            ->update(
                [
                'fullname' => request(['fullname']),
                'firstname' => request(['firstname']),
                'lastname' => request(['lastname']),
                'address' => request(['address']),
                'sex' => request(['sex']),
                'email' => request(['email']),
                'telephone' => request(['telephone'])
                ]);*/

        DB::table('users')->updateOrInsert(
            [
                'email' => $request->get('oldemail'),
            ],
            [
                'fullname' => $request->get('fullname'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'address' => $request->get('address'),
                'sex' => $request->get('sex'),
                'email' => $request->get('email'),
                'telephone' => $request->get('telephone')

            ]
        );
        $credentials = request(['email', 'password']);

    }

}