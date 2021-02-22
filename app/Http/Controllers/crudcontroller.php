<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class crudcontroller extends Controller
{
    //
    public  function datainsert(Request $request){
        $data = $request->input('connectiondata');
        $type = $request->input('connectiontype');
        $userid=Auth::id();
        DB::table('connections')->insert(
            [
                'data' => $data,
                'type' => $type,
                'userid'=>$userid

            ]

        );

        return redirect('/manageidentity');


    }

    public  function dataupdate(Request $request){

        $data = $request->input('newdata');

        $id = $request->input('id');

        DB::table('connections')->where('id', '=', $id)->update(
            [
                'data' => $data

            ]

        );



        return redirect('/manageidentity');




    }
    public  function datadelete(Request $request){
        $id = $request->input('id');
        DB::table('connections')->where('id', '=', $id)->delete();

        return redirect('/manageidentity');



    }



}
