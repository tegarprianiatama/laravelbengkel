<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jmlBrg = DB::table('data_barang')->where('STOK', '<=', 5)->count();
        return view('home')->with(['jmlBrg'=> $jmlBrg]);
    }
}
