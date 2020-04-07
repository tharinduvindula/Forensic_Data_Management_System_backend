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

}
