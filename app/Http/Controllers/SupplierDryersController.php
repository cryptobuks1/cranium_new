<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DataTables\SupplierDryersDataTable;
use App\SupplierDryers;
use DataTables;

class SupplierDryersController extends Controller
{
		public function __construct()
	{
		ini_set('max_execution_time', 999999);
		ini_set('memory_limit', '1024M');
	}
    public function getdryerproducts(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('supplier_dryers')->get();
            //var_dump($data);
            //die();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" onclick="editdryerproduct()" id="editdryerproduct" class="edit btn btn-primary btn-sm">Sync</a>';
                           //$btn = '<a href="javascript:void(0)" onclick="syncwithmaster()" id="syncwithmaster" class="edit btn btn-primary btn-sm">Sync</a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        //return view('productedit');
    }
	public function dryerproductlist(Request $request){
		
		$productid = $request->id;
		$productdetails = DB::table('supplier_dryers')->find($productid);
		
		return view('supplierProdListing.producteditDryer', ['productdetails' =>$productdetails]);
	}
	
	public function updatedryer(Request $request){
		$updateproductDryer = [];
		$id=$request->get('id');
		$updateproductDryer['ETIN'] = $request->get('ETIN');
		$updateproductDryer['etailer_stock_status'] = $request->get('etailer_stock_status');
		$updateproductDryer['list_status'] = $request->get('list_status');
		$updateproductDryer['acquisition_cost'] = $request->get('acquisition_cost');
		$updateproductDryer['B'] = $request->get('b');
		$updateproductDryer['no'] = $request->get('no');
		$updateproductDryer['P'] = $request->get('p');
		$updateproductDryer['trak_num'] = $request->get('trak_num');
		$updateproductDryer['archive'] = $request->get('archive');
		$updateproductDryer['brand_name'] = $request->get('brand_name');
		$updateproductDryer['sub_brand'] = $request->get('sub_brand');
		$updateproductDryer['im_gr'] = $request->get('im_gr');
		$updateproductDryer['pack_description'] = $request->get('pack_description');
		$updateproductDryer['fanc_name'] = $request->get('fanc_name');
		$updateproductDryer['std_ID'] = $request->get('std_ID');
		$updateproductDryer['flavor_declaration'] = $request->get('flavor_declaration');
		$updateproductDryer['art_flv_clr_declar'] = $request->get('art_flv_clr_declar');
		$updateproductDryer['vol_fl_oz'] = $request->get('vol_fl_oz');
		$updateproductDryer['vol_fl_oz_tot'] = $request->get('vol_fl_oz_tot');
		$updateproductDryer['wt_pc_g'] = $request->get('wt_pc_g');
		$updateproductDryer['unts_cart'] = $request->get('unts_cart');
		$updateproductDryer['PCS_CS'] = $request->get('PCS_CS');
		$updateproductDryer['bndl_cs_per_bndl'] = $request->get('bndl_cs_per_bndl');
		$updateproductDryer['gallons'] = $request->get('gallons');
		$updateproductDryer['pint'] = $request->get('pint');
		$updateproductDryer['quart'] = $request->get('quart');
		$updateproductDryer['PACKVAR_FLOZ_DEC'] = $request->get('PACKVAR_FLOZ_DEC');
		$updateproductDryer['PACKVAR_FLOZ_mL'] = $request->get('PACKVAR_FLOZ_mL');
		$updateproductDryer['PACKVAR_FLOZ_Servings'] = $request->get('PACKVAR_FLOZ_Servings');
		$updateproductDryer['imrex'] = $request->get('imrex');
		$updateproductDryer['globe'] = $request->get('globe');
		$updateproductDryer['UPC'] = $request->get('UPC');
		$updateproductDryer['consumer_code'] = $request->get('consumer_code');
		$updateproductDryer['case_code'] = $request->get('case_code');
		$updateproductDryer['kosher'] = $request->get('kosher');
		$updateproductDryer['type_kosher'] = $request->get('type_kosher');
		$updateproductDryer['y_not'] = $request->get('y_not');
		$updateproductDryer['claim_description'] = $request->get('claim_description');
		$updateproductDryer['comparative_statement'] = $request->get('comparative_statement');
		$updateproductDryer['disclosure_statement'] = $request->get('disclosure_statement');
		$updateproductDryer['previous_claim_and_disclosure'] = $request->get('previous_claim_and_disclosure');
		$updateproductDryer['warning_statement'] = $request->get('warning_statement');
		$updateproductDryer['ingredient_statement'] = $request->get('ingredient_statement');
		$updateproductDryer['spacer1'] = $request->get('spacer1');
		$updateproductDryer['spacer2'] = $request->get('spacer2');
		$updateproductDryer['nutrition_facts_panel'] = $request->get('nutrition_facts_panel');
		
		$affected = DB::table('supplier_dryers')->where('id', $id)->update($updateproductDryer);
		return redirect('/dryerproductlist')->with('status', 'Product is updated..');
	}
}
