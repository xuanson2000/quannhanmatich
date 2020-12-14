<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
use DB;

class controllerTinhtoan extends Controller
{
    //

    public function index(){
//$tests=test::get();
    //	count()->

//$tests=test::where('gianiemyet','>',3000000)->count();
// $tests = DB::table('test')
//     ->select(DB::raw('count(*) as user_count, gianiemyet'))
//     ->where('gianiemyet', '>', 1000000)
//     ->groupBy('gianiemyet')
//     ->get();


    	$tests = test::selectRaw('YEAR(ngay) as year, COUNT(id) as amount')
    	->groupByRaw('YEAR(ngay)')
    	->havingRaw('YEAR(ngay) > 2')
    	->orderByRaw('YEAR(ngay)')
    	->get();

dd($tests);

    	return view('quantri.tinhtoan.index',['tests'=>$tests]);
    }
}
