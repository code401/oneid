<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
class manageidentitycontroller extends Controller
{
    //
    public function index()
    {
        $id= Auth::id();

        $data = DB::table('connections')->where('userid', '=', $id)->simplePaginate(1);


        return view('manageidentity', ['data' => $data]);





    }


}
