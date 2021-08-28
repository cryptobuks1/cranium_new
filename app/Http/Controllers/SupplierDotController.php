<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterProduct;
use App\SupplierDot;
use App\MappingTables;
use App\CsvHeader;
use DB;
use Schema;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Imports\CsvDataImport;
use App\Http\Requests\CsvImportRequest;
use DataTables;

class SupplierDotController extends Controller
{
	public function __construct()
	{
		ini_set('max_execution_time', 999999);
		ini_set('memory_limit', '1024M');
	}
	
    public function map_supplier_dot_with_master_product(){
        $supplierDot = Schema::getColumnListing('supplier_dot');
        
        if (($key = array_search('id', $supplierDot)) !== false) {
            unset($supplierDot[$key]);
        }
        if (($key = array_search('created_at', $supplierDot)) !== false) {
            unset($supplierDot[$key]);
        }
        if (($key = array_search('updated_at', $supplierDot)) !== false) {
            unset($supplierDot[$key]);
        }

        $masterProduct = Schema::getColumnListing('master_product');

        if (($key = array_search('id', $masterProduct)) !== false) {
            unset($masterProduct[$key]);
        }
        if (($key = array_search('created_at', $masterProduct)) !== false) {
            unset($masterProduct[$key]);
        }
        if (($key = array_search('updated_at', $masterProduct)) !== false) {
            unset($masterProduct[$key]);
        }
        
        return view('supplierMapping.map_supplier_dot_with_master_product', compact('supplierDot', 'masterProduct'));
    }

    public function save_supplier_dot_with_master_product(Request $request){
        $request = $request->except(['_token']);
        $request_arr = (array) $request;

        $mappingTable = MappingTables::where('type', $request_arr['type'])->first();
        if(!$mappingTable){
            $mappingTable = new MappingTables();
        }

        if (($key = array_search('Select', $request_arr)) !== false) {
            unset($request_arr[$key]);
        }
        
        $mappingTable->type = $request_arr['type'];
        $mappingTable->map_data = json_encode($request_arr);
        $mappingTable->save();

        return redirect()->back();
    }

    public function map_supplier_with_csv()
    {
        return view('cranium.csvMapping.map_supplier_with_csv');
    }

    public function import_map_supplier_with_csv(CsvImportRequest $request){
        try{
            $supplier_fields = array();
            $header = array();

            $mimes = array('csv');
            $extension = pathinfo($request->file('csv_file')->getClientOriginalName(), PATHINFO_EXTENSION);

            if (in_array($extension, $mimes)) {
                $path = $request->file('csv_file')->getRealPath();
                if ($request->has('header')) {
                    $data = (new HeadingRowImport)->toArray(request()->file('csv_file'));
                } else {
                    $data = array_map('str_getcsv', file($path));
                }
                
                if (count($data[0]) > 0) {
                    if ($request->has('header')) {
                        $csv_header_fields = [];
                        foreach ($data[0] as $key => $value) {
                            $csv_header_fields[] = $key;
                        }
                    }
                    //$csv_data = $data[0];
                    //$csv_data = array_slice($data[0], 0, 1);
                    $header = $data[0];
                    $supplier_name = $request->input('supplier_name');


                    if($request->input('supplier_name') == 'supplier_dot'){
                        $supplier_fields = Schema::getColumnListing('supplier_dot');
                    }
                    if($request->input('supplier_name') == 'supplier_kehe'){
                        $supplier_fields = Schema::getColumnListing('supplier_kehe');
                    }
                    if($request->input('supplier_name') == 'supplier_dryers'){
                        $supplier_fields = Schema::getColumnListing('supplier_dryers');
                    }
                    if($request->input('supplier_name') == 'supplier_mars'){
                        $supplier_fields = Schema::getColumnListing('supplier_mars');
                    }
                    if($request->input('supplier_name') == 'supplier_miscellaneous'){
                        $supplier_fields = Schema::getColumnListing('supplier_miscellaneous');
                    }
                    if($request->input('supplier_name') == 'supplier_nestle'){
                        $supplier_fields = Schema::getColumnListing('supplier_nestle');
                    }
                    if($request->input('supplier_name') == 'supplier_hersley'){
                        $supplier_fields = Schema::getColumnListing('supplier_hersley');
                    }
                    if($request->input('supplier_name') == 'supplier_3pl'){
                        $supplier_fields = Schema::getColumnListing('3pl_client_product');
                    }


                    // Remove id, timestamp from fieldlist
                    if (($key = array_search('id', $supplier_fields)) !== false) {
                        unset($supplier_fields[$key]);
                    }
                    if (($key = array_search('created_at', $supplier_fields)) !== false) {
                        unset($supplier_fields[$key]);
                    }
                    if (($key = array_search('updated_at', $supplier_fields)) !== false) {
                        unset($supplier_fields[$key]);
                    }

                    if (!isset($header)) {
                        return redirect()->back()->with('error-msg', 'First Column of your CSV file is Blank, Unable to Map your Headers');
                    }


                } else {
                    return redirect()->back();
                }

                return view('csvMapping.import_supplier_csv', compact('header','supplier_fields','supplier_name'));
            } else {
                return redirect()->back()->with('error-msg', 'Please upload CSV formatted file');
            }
        }
        catch (\Throwable $e) {
            //Log::channel('daily')->error($e);
            return redirect()->back()->with('error-msg', 'Please upload correct CSV formatted file');
        }
        
    }

    public function save_supplier_with_csv(Request $request){
        //dd($request->input('supplier_name'));
        $supplier_name = $request->input('supplier_name');
        $request = $request->except(['_token', 'supplier_name']);
        //$request = $request->except(['supplier_name']);

        $request_arr = (array) $request;

        $mappingTable = CsvHeader::where('map_type', $supplier_name)->first();
        if(!$mappingTable){
            $mappingTable = new CsvHeader();
        }

        if (($key = array_search(null, $request_arr)) !== false) {
            unset($request_arr[$key]);
        }
        
        $mappingTable->map_type = $supplier_name;
        $mappingTable->map_data = json_encode($request_arr);
        $mappingTable->save();

        return redirect()->to('/map_supplier_with_csv');
    }
	
	public function upload_csv_to_table(Request $request){
		 $suppliername = $request->supplier_name;
		 $csv_header = DB::table('csv_header')->where('map_type', '=', $suppliername)->get();

		 $map_json_array = json_decode($csv_header[0]->{'map_data'});
	 
		 $suppliercolumnname = Schema::getColumnListing($suppliername);
		 
		$file = $request->file('csv_file');
		$path = $file->getRealPath();

		$data = array_map('str_getcsv', file($path));
		$csv_data_for_header = array_slice($data, 0, 5);
		$csv_data = array_slice($data, 1, 50000);
		$csv_data_count = count($csv_data);

			$csvheader = $csv_data_for_header[0];
			
		foreach($csv_data as $csv_data_single){	
				$keyarray = null;
				$keynumarray = null;
			
			foreach ($map_json_array as $key=>$value){

				if($value){				
					if ($keynum = array_search(strtolower($value), array_map('strtolower', $csvheader))) {
				 $keyarray[] = $key;
				 $keynumarray[]= $keynum;
					}
				}
			}

			$insertarray = null;
			foreach($keynumarray as $keynumsingle){
				 $insertarray[] = htmlspecialchars(str_replace("<br />", "",nl2br($csv_data_single[$keynumsingle])),ENT_SUBSTITUTE);
			}

			$orderProductsData[] = array_combine ($keyarray , $insertarray);
			$insert = DB::table($suppliername)->insert($orderProductsData);
			$orderProductsData = null;
			

			}
			return redirect()->back()->with('message', 'Data Inserted Sucessfully...');

	}
	
	public function update_data_using_csv(Request $request){

			$requestsuppliername = $request->supplier_name;
			$supplier_table_columnname = Schema::getColumnListing($requestsuppliername);
			$requestsuppliername = $request->supplier_name;


			$requestsuppliername = $request->supplier_name;
			$csv_header_map = DB::table('csv_header')->where('map_type', '=', $requestsuppliername)->get();
			$map_json_array = json_decode($csv_header_map[0]->{'map_data'});
			$file = $request->file('csv_file');
			$path = $file->getRealPath();
			$data = array_map('str_getcsv', file($path));
			$csv_data_for_header = array_slice($data, 0, 5);
			$csvheader = $csv_data_for_header[0];

			$csv_data = array_slice($data, 1, 50000);
			$csv_data_count = count($csv_data);


			if ($supplier_table_columnname !== false){
				$upckeynum = array_search(strtolower('UPC'), array_map('strtolower', $csvheader));
				
				foreach($csv_data as $csv_data_single){	
				$keyarray = null;
				$keynumarray = null;

					foreach ($map_json_array as $key=>$value){
						if($value){
							if($value !== 'UPC') {
								if ($keynum = array_search(strtolower($value), array_map('strtolower', $csvheader))) {
							 $keyarray[] = $key;
							 $keynumarray[]= $keynum;
								}
							}
						}
					}

					$updatearray = null;
					foreach($keynumarray as $keynumsingle){
						$updatearray[] = htmlspecialchars(str_replace("<br />", "",nl2br($csv_data_single[$keynumsingle])),ENT_SUBSTITUTE);

					}

					$orderProductsData[] = array_combine ($keyarray , $updatearray);
					
					
						if (DB::table($requestsuppliername)->where('UPC', $csv_data_single[$upckeynum])->exists()) {

							$dbupdate = DB::table($requestsuppliername)
										->where('UPC', $csv_data_single[$upckeynum])
										->update($orderProductsData[0]);
							//$output[] = "UPC ".$csv_data_single[$upckeynum]."Updated.";
							// FIRE MAIL FUNCTIONALITY ON UPDATE (Future Scope)
						} 
						/*$user = DB::table($requestsuppliername)->where('UPC', '=', $csv_data_single[$upckeynum])->first();
						if ($user === null) {						


							$insert = DB::table($requestsuppliername)->insert($orderProductsData[0]);
							$output[] = "UPC ".$csv_data_single[$upckeynum]."Inserted.";
						}*/
					
		  
					$orderProductsData = null;

			}

			return redirect()->back()->with('message', 'Records are updated..');


		} else {
			return redirect()->back()->with('html', 'ETIN field is not available at selected table. Please try with diffrent Supplier.');
		}

	}
	
	public function getdotproducts(Request $request)
    {
		
        if ($request->ajax()) {
            $data = DB::table('supplier_dot')->get();
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
