@@extends('layouts.master')

@section('main-content')
<form method="POST" action="{{ route('updatedryer') }}">
	@csrf
	@method('put')

	<input type="hidden" value="{{$productdetails->id}}" name='id'>
	<div class="form-group row">
		<h2 style="text-align:center;">Edit DRYER Product</h2> 
	</div>
	
	<hr>
  
	<div class="form-group row">
		<label class="col-4 col-form-label" for="ETIN">ETIN</label> 
		<div class="col-8">
			<input id="ETIN" name="ETIN" type="text" class="form-control" value="{{$productdetails->ETIN}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="etailer_stock_status" class="col-4 col-form-label">Etailer Stock Status</label> 
		<div class="col-8">
			<input id="etailer_stock_status" name="etailer_stock_status" type="text" class="form-control" value="{{$productdetails->etailer_stock_status}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="list_status" class="col-4 col-form-label">List Status</label> 
		<div class="col-8">
			<input id="list_status" name="list_status" type="text" class="form-control" value="{{$productdetails->list_status}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="acquisition_cost" class="col-4 col-form-label">Acquisition Cost</label> 
		<div class="col-8">
			<input id="acquisition_cost" name="acquisition_cost" type="text" class="form-control" value="{{$productdetails->acquisition_cost}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="b" class="col-4 col-form-label">B</label> 
		<div class="col-8">
			<input id="b" name="b" type="text" class="form-control" value="{{$productdetails->B}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="no" class="col-4 col-form-label">No</label> 
		<div class="col-8">
			<input id="no" name="no" type="text" class="form-control" value="{{$productdetails->no}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="p" class="col-4 col-form-label">P</label> 
		<div class="col-8">
			<input id="p" name="p" type="text" class="form-control" value="{{$productdetails->P}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="trak_num" class="col-4 col-form-label">Trak Num</label> 
		<div class="col-8">
			<input id="trak_num" name="trak_num" type="text" class="form-control" value="{{$productdetails->trak_num}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="archive" class="col-4 col-form-label">Archive</label> 
		<div class="col-8">
			<input id="archive" name="archive" type="text" class="form-control" value="{{$productdetails->archive}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="brand_name" class="col-4 col-form-label">Brand Name</label> 
		<div class="col-8">
			<input id="brand_name" name="brand_name" type="text" class="form-control" value="{{$productdetails->brand_name}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="sub_brand" class="col-4 col-form-label">Sub Brand</label> 
		<div class="col-8">
			<input id="sub_brand" name="sub_brand" type="text" class="form-control" value="{{$productdetails->sub_brand}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="im_gr" class="col-4 col-form-label">Im Gr</label> 
		<div class="col-8">
			<input id="im_gr" name="im_gr" type="text" class="form-control" value="{{$productdetails->im_gr}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="pack_description" class="col-4 col-form-label">Pack Description</label> 
		<div class="col-8">
			<input id="pack_description" name="pack_description" type="text" class="form-control" value="{{$productdetails->pack_description}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="fanc_name" class="col-4 col-form-label">Fanc Name</label> 
		<div class="col-8">
			<input id="fanc_name" name="fanc_name" type="text" class="form-control" value="{{$productdetails->fanc_name}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="std_ID" class="col-4 col-form-label">Std ID</label> 
		<div class="col-8">
			<input id="std_ID" name="std_ID" type="text" class="form-control" value="{{$productdetails->std_ID}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="flavor_declaration" class="col-4 col-form-label">Flavor Declaration</label> 
		<div class="col-8">
			<input id="flavor_declaration" name="flavor_declaration" type="text" class="form-control" value="{{$productdetails->flavor_declaration}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="art_flv_clr_declar" class="col-4 col-form-label">Art Flv Clr Declar</label> 
		<div class="col-8">
			<input id="art_flv_clr_declar" name="art_flv_clr_declar" type="text" class="form-control" value="{{$productdetails->art_flv_clr_declar}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="vol_fl_oz" class="col-4 col-form-label">Vol Fl Oz</label> 
		<div class="col-8">
			<input id="vol_fl_oz" name="vol_fl_oz" type="text" class="form-control" value="{{$productdetails->vol_fl_oz}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="vol_fl_oz_tot" class="col-4 col-form-label">Vol Fl Oz Tot</label> 
		<div class="col-8">
			<input id="vol_fl_oz_tot" name="vol_fl_oz_tot" type="text" class="form-control" value="{{$productdetails->vol_fl_oz_tot}}">
		</div>
  </div>
	<div class="form-group row">
		<label for="wt_pc_g" class="col-4 col-form-label">Wt Pc G</label> 
		<div class="col-8">
			<input id="wt_pc_g" name="wt_pc_g" type="text" class="form-control" value="{{$productdetails->wt_pc_g}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="unts_cart" class="col-4 col-form-label">Unts Cart</label> 
		<div class="col-8">
			<input id="unts_cart" name="unts_cart" type="text" class="form-control" value="{{$productdetails->unts_cart}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="PCS_CS" class="col-4 col-form-label">PCS CS</label> 
		<div class="col-8">
			<input id="PCS_CS" name="PCS_CS" type="text" class="form-control" value="{{$productdetails->PCS_CS}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="bndl_cs_per_bndl" class="col-4 col-form-label">Bndl Cs Per Bndl</label> 
		<div class="col-8">
			<input id="bndl_cs_per_bndl" name="bndl_cs_per_bndl" type="text" class="form-control" value="{{$productdetails->bndl_cs_per_bndl}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="gallons" class="col-4 col-form-label">Gallons</label> 
		<div class="col-8">
			<input id="gallons" name="gallons" type="text" class="form-control" value="{{$productdetails->gallons}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="pint" class="col-4 col-form-label">Pint</label> 
		<div class="col-8">
			<input id="pint" name="pint" type="text" class="form-control" value="{{$productdetails->pint}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="quart" class="col-4 col-form-label">Quart</label> 
		<div class="col-8">
			<input id="quart" name="quart" type="text" class="form-control" value="{{$productdetails->quart}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="PACKVAR_FLOZ_DEC" class="col-4 col-form-label">PACKVAR FLOZ DEC</label> 
		<div class="col-8">
			<input id="PACKVAR_FLOZ_DEC" name="PACKVAR_FLOZ_DEC" type="text" class="form-control" value="{{$productdetails->PACKVAR_FLOZ_DEC}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="PACKVAR_FLOZ_mL" class="col-4 col-form-label">PACKVAR FLOZ ML</label> 
		<div class="col-8">
			<input id="PACKVAR_FLOZ_mL" name="PACKVAR_FLOZ_mL" type="text" class="form-control" value="{{$productdetails->PACKVAR_FLOZ_mL}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="PACKVAR_FLOZ_Servings" class="col-4 col-form-label">PACKVAR FLOZ Servings</label> 
		<div class="col-8">
			<input id="PACKVAR_FLOZ_Servings" name="PACKVAR_FLOZ_Servings" type="text" class="form-control" value="{{$productdetails->PACKVAR_FLOZ_Servings}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="imrex" class="col-4 col-form-label">Imrex</label> 
		<div class="col-8">
			<input id="imrex" name="imrex" type="text" class="form-control" value="{{$productdetails->imrex}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="globe" class="col-4 col-form-label">Globe</label> 
		<div class="col-8">
			<input id="globe" name="globe" type="text" class="form-control" value="{{$productdetails->globe}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="UPC" class="col-4 col-form-label">UPC</label> 
		<div class="col-8">
			<input id="UPC" name="UPC" type="text" class="form-control" value="{{$productdetails->UPC}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="consumer_code" class="col-4 col-form-label">Consumer Code</label> 
		<div class="col-8">
			<input id="consumer_code" name="consumer_code" type="text" class="form-control" value="{{$productdetails->consumer_code}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="case_code" class="col-4 col-form-label">Case Code</label> 
		<div class="col-8">
			<input id="case_code" name="case_code" type="text" class="form-control" value="{{$productdetails->case_code}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="kosher" class="col-4 col-form-label">Kosher</label> 
		<div class="col-8">
			<input id="kosher" name="kosher" type="text" class="form-control" value="{{$productdetails->kosher}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="type_kosher" class="col-4 col-form-label">Type Kosher</label> 
		<div class="col-8">
			<input id="type_kosher" name="type_kosher" type="text" class="form-control" value="{{$productdetails->type_kosher}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="y_not" class="col-4 col-form-label">Y Not</label> 
		<div class="col-8">
			<input id="y_not" name="y_not" type="text" class="form-control" value="{{$productdetails->y_not}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="claim_description" class="col-4 col-form-label">Claim Description</label> 
		<div class="col-8">
			<input id="claim_description" name="claim_description" type="text" class="form-control" value="{{$productdetails->claim_description}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="comparative_statement" class="col-4 col-form-label">Comparative Statement</label> 
		<div class="col-8">
			<input id="comparative_statement" name="comparative_statement" type="text" class="form-control" value="{{$productdetails->comparative_statement}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="disclosure_statement" class="col-4 col-form-label">Disclosure Statement</label> 
		<div class="col-8">
			<input id="disclosure_statement" name="disclosure_statement" type="text" class="form-control" value="{{$productdetails->disclosure_statement}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="previous_claim_and_disclosure" class="col-4 col-form-label">Previous Claim And Disclosure</label> 
		<div class="col-8">
			<input id="previous_claim_and_disclosure" name="previous_claim_and_disclosure" type="text" class="form-control" value="{{$productdetails->previous_claim_and_disclosure}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="warning_statement" class="col-4 warning_statement-form-label">Warning Statement</label> 
		<div class="col-8">
			<input id="warning_statement" name="warning_statement" type="text" class="form-control" value="{{$productdetails->warning_statement}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="ingredient_statement" class="col-4 col-form-label">Ongredient Statement</label> 
		<div class="col-8">
			<input id="ingredient_statement" name="ingredient_statement" type="text" class="form-control" value="{{$productdetails->ingredient_statement}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="spacer1" class="col-4 col-form-label">Spacer1</label> 
		<div class="col-8">
			<input id="spacer1" name="spacer1" type="text" class="form-control" value="{{$productdetails->spacer1}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="spacer2" class="col-4 col-form-label">Spacer2</label> 
		<div class="col-8">
			<input id="spacer2" name="spacer2" type="text" class="form-control" value="{{$productdetails->spacer2}}">
		</div>
	</div>
	<div class="form-group row">
		<label for="nutrition_facts_panel" class="col-4 col-form-label">Nutrition Facts Panel</label> 
		<div class="col-8">
			<input id="nutrition_facts_panel" name="nutrition_facts_panel" type="text" class="form-control" value="{{$productdetails->nutrition_facts_panel}}">
		</div>
	</div>
  
	<div class="form-group row">
		<div class="offset-4 col-8">
			<button name="submit" type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>
@endsection