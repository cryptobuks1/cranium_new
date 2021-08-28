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
    <h1>Supplier DOT Product List</h1>
    <table class="table table-bordered data-table" id="datatable">
        <thead>
            <tr>
                <th class="idclass" id="idclass">ID</th>
                <th>ETIN</th>
                <th>Corporate Supplier</th>
                <th>Product Line</th>
                <th>Brand</th>
                <th>Dot Item</th>
                <th>Manufacturer Item</th>
                <th>GTIN/UPC</th>
                <th>Item Description</th>
                <th>Diet Type</th>
                <th>Class Of Trade</th>				
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
        ajax: "{{ route('getdotproducts') }}",
        columns: [
            {data: 'id', name: 'ID'},
            {data: 'ETIN', name: 'ETIN'},
            {data: 'corporate_supplier', name: 'Corporate Supplier'},
            {data: 'product_line', name: 'Product Line'},
            {data: 'brand', name: 'IM GR'},
            {data: 'dot_item', name: 'Dot Item'},
            {data: 'manufacturer_item', name: 'Manufacturer Item'},
            {data: 'GTIN/UPC', name: 'GTIN/UPC'},
            {data: 'item_description', name: 'Item Description'},
            {data: 'diet_type', name: 'Diet Type'},
            {data: 'class_of_Trade', name: 'Class Of Trade'},
            {data: 'action', name: 'Action', orderable: false},            
        ],
		 oLanguage: {
            "sSearch": "Filter results Via GTIN/UPC:"
        },
    });    
  });
</script>

@endsection