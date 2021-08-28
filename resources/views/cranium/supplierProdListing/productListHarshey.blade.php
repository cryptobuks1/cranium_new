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
    <h1>Supplier HERSHEY Product List</h1>
    <table class="table table-bordered data-table" id="datatable">
        <thead>
            <tr>
                <th class="idclass" id="idclass">ID</th>
                <th>ETIN</th>
                <th>Promoted Product Groups</th>
                <th>Brand</th>
                <th>Item No</th>
                <th>Description</th>
                <th>Pkg</th>
                <th>UPC</th>
                <th>Price 2 1000 5 999 lbs</th>
                <th>Price 3 6000 24 999 lbs</th>
                <th>Price 4 25000 lbs</th>
                <th>Net Wt</th>
                <th>Net Wt UOM</th>
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
        ajax: "{{ route('gethersheyproducts') }}",
        columns: [
            {data: 'id', name: 'ID'},
            {data: 'ETIN', name: 'ETIN'},
            {data: 'promoted_product_groups', name: 'Promoted Product Groups'},
            {data: 'brand', name: 'Brand'},
            {data: 'item_no', name: 'Item No'},
            {data: 'description', name: 'Description'},
            {data: 'pkg', name: 'Pkg'},
            {data: 'UPC', name: 'UPC'},
            {data: 'price_sch_2_1000_5_999_lbs', name: 'Price 2 1000 5 999 lbs'},
            {data: 'price_sch_3_6000_24_999_lbs', name: 'Price 3 6000 24 999 lbs'},
            {data: 'price_sch_4_25000_lbs', name: 'Price 4 25000 lbs'},
            {data: 'net_wt', name: 'Net Wt'},
            {data: 'net_wt_UOM', name: 'Net Wt UOM'},
            {data: 'action', name: 'Action', orderable: false},            
        ],
		 oLanguage: {
            "sSearch": "Filter results Via UPC:"
        },
    });    
  });
  
	/*function edithersheyproduct(){
		var table = null;
		var table = $('#datatable').DataTable();
		$('#datatable tbody').on( 'click', 'tr', function () {
			var row = table.row( this ).data();
			window.location="hersheyproductlist/"+row['id']; 
		});
	}
	function syncwithmaster(){
		var table = null;
		var table = $('#datatable').DataTable();
		$('#datatable tbody').on( 'click', 'tr', function () {
			var row = table.row( this ).data();
			window.location="syncwithmaster/"+row['id']; 
		});
	}*/
</script>

@endsection