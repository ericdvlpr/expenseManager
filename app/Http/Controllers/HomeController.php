<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use DB;
use Response;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('expenses')
        ->select(
            DB::raw('expense_category as category'),
            DB::raw('count(amount) as expense'),
            DB::raw('sum(amount) as total'))
           ->groupBy('expense_category')
           ->get();
        $charts[] = ['category', 'expense'];
        foreach($data as $key => $value){
            $charts[++$key] = [$value->category, $value->expense];
        }
        $table = array();
        foreach($data as $key => $val){
            $table[]=['category_name'=>$val->category,'total'=>$val->total];
        }
        return view('home')->with('data',compact('charts','table'));
        }
    
}
