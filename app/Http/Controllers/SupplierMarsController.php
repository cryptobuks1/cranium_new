<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\SupplierMars;

class SupplierMarsController extends Controller
{
		public function __construct()
	{
		ini_set('max_execution_time', 999999);
		ini_set('memory_limit', '1024M');
	}
	public function getmarsproducts(Request $request)
    {
		
        if ($request->ajax()) {
            $data = DB::table('supplier_mars')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" onclick="syncdotproduct()" id="syncdotproduct" class="edit btn btn-primary btn-sm">Sync</a>';
                           //$btn = '<a href="javascript:void(0)" onclick="syncwithmaster()" id="syncwithmaster" class="edit btn btn-primary btn-sm">Sync</a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }
}
