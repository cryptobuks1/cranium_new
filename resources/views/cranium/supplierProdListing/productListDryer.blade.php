@extends('layouts.master')

@section('main-content')
<style>
.data-table tr td:nth-child(1) {
    display: none;
}
.idclass {
    display: none;
}
.sidebar-custom {
    height: 2000px !important;
}
</style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />   
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    

<div class="container">
    <h1>Supplier DRYER Product List</h1>
    <table class="table table-bordered data-table" id="datatable">
        <thead>
            <tr>
                <th class="idclass" id="idclass">ID</th>
                <th>Brand Name</th>
                <th>Sub Brand</th>
                <th>IM GR</th>
                <th>Pack Description</th>
                <th>Fanc Name</th>
                <th>Std ID</th>
                <th>Flavor Declaration</th>
                <th>Globe</th>
                <th>UPC</th>
                <th>Consumer Code</th>
                <th>Case Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('getdryerproducts') }}",
        columns: [
            {data: 'id', name: 'ID'},
            {data: 'brand_name', name: 'Brand Name'},
            {data: 'sub_brand', name: 'Sub Brand'},
            {data: 'im_gr', name: 'IM GR'},
            {data: 'pack_description', name: 'Pack Description'},
            {data: 'fanc_name', name: 'Fanc Name'},
            {data: 'std_ID', name: 'Std ID'},
            {data: 'flavor_declaration', name: 'Flavor Declaration'},
            {data: 'globe', name: 'Globe'},
            {data: 'UPC', name: 'UPC'},
            {data: 'consumer_code', name: 'Consumer Code'},
            {data: 'case_code', name: 'Case Code'},
            {data: 'action', name: 'Action', orderable: false},            
        ],
		 oLanguage: {
            "sSearch": "Filter results Via UPC:"
        },
    });    
  });
  
	function editdryerproduct(){
		var table = null;
		var table = $('#datatable').DataTable();
		$('#datatable tbody').on( 'click', 'tr', function () {
			var row = table.row( this ).data();
			window.location="dryerproductlist/"+row['id']; 
		});
	}
	/*function syncwithmaster(){
		var table = null;
		var table = $('#datatable').DataTable();
		$('#datatable tbody').on( 'click', 'tr', function () {
			var row = table.row( this ).data();
			window.location="syncwithmaster/"+row['id']; 
		});
	}*/
</script>

@endsection