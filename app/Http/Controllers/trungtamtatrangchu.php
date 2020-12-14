<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class trungtamtatrangchu extends Controller
{
    //

    public  function trungtamtatrangchu(){

       $slides=DB::table('slide')->orderBy('created_at','DESC')->take(2)->get();

    	 return view('trangchu.index',['slides'=>$slides]);

    }
}


