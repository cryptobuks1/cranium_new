@extends('layouts.master')

@section('main-content')

<div class="container">
    <div class="h-100 row align-items-center">
        <div class="col-md-8 col-md-offset-2">
			<div class="panel panel-select" id="panel-select">
				I need to <select id="insert-or-update">
							<option value=""> .. Select an Action .. </option>
							<option value="insert"> Insert </option>
							<option value="update"> Update </option>
						</select> Product
			</div>
			
			<div class="panel panel-insert" id="panel-insert" style="display:none;">
			<br><br>
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Insert Data</h2></div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('upload_csv_to_table') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											Select Supplier Type
										</label>
										<select name="supplier_name" class="form-control">
											<option value="">Select</option>
											<option value="supplier_dot">DOT</option>
											<option value="supplier_kehe">KEHE</option>
											<option value="supplier_dryers">DRYERS</option>
											<option value="supplier_hersley">HERSLEY</option>
											<option value="supplier_mars">MARS</option>
											<option value="supplier_nestle">NESTLE</option>
											<option value="supplier_lipari">LIPARI</option>
											<option value="supplier_misc">MISC.</option>
										</select>
										
									</div>
								</div>
							</div>

							<br>

							<div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
								<label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

								<div class="col-md-6">
									<input id="csv_file_import" type="file" class="form-control" name="csv_file" required>

									@if ($errors->has('csv_file'))
										<span class="help-block">
										<strong>{{ $errors->first('csv_file') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<!--<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="header" checked> File contains header row?
										</label>
									</div>
								</div>
							</div>-->

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Insert Data
									</button>
								</div>
							</div>
						</form>

					</div>
				</div>
            </div>

			<div class="panel panel-update" id="panel-update" style="display:none;">
			<br><br>
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Update Data</h2> <sub>(Update available using "ETIN" only)</sub></div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('update_data_using_csv') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											Select Supplier Type (where ETIN product update available)
										</label>
										<select name="supplier_name" class="form-control">
											<option value="">Select</option>
											<option value="supplier_dot">DOT</option>
											<option value="supplier_kehe">KEHE</option>
											<option value="supplier_dryers">DRYERS</option>
											<option value="supplier_hersley">HERSLEY</option>
											<option value="supplier_mars">MARS</option>
											<option value="supplier_nestle">NESTLE</option>
											<option value="supplier_miscellaneous">MISC.</option>
										</select>
										
									</div>
								</div>
							</div>

							<br>

							<div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
								<label for="csv_file" class="col-md-4 control-label">CSV file to Update</label>

								<div class="col-md-6">
									<input id="csv_file_update" type="file" class="form-control" name="csv_file" required>

									@if ($errors->has('csv_file'))
										<span class="help-block">
										<strong>{{ $errors->first('csv_file') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<!--<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="header" checked> File contains header row?
										</label>
									</div>
								</div>
							</div>-->

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Update Data
									</button>
								</div>
							</div>
						</form>
							@if(session()->has('message'))
							<div class="alert alert-success">
							{{ session()->get('message') }}
							</div>
							@endif
					</div>
				</div>
			</div>			
        </div>
    </div>
</div>

@endsection

@section('bottom-js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#insert-or-update').on('change', function() {
		//alert( this.value );
			if(this.value == "insert"){
				$('#panel-insert').show();
				$('#panel-update').hide();
			}
			if(this.value == "update"){
				$('#panel-insert').hide();
				$('#panel-update').show();
			}
		});
		});
	</script>
@endsection