<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Products</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
	 #product_list table tr td{
	 	text-align: right;	 	
	 	padding: 0px !important;
	 	margin:0px !important;
	 	width:10px !important;
	 }
	 #product_list table tr td:nth-child(1){
	 	text-align: left;
	 }
	 #product_list table tr{
	 	width:600px;
	 }
	 #product_list table{
	 	table-layout: fixed;
	 	width: 600px;
	 }
	 #total{
	 	text-align: right;
	 }
	</style>
	
</head>

<body>
  <div class="container">
	@yield('content')
  </div>
   <meta name="_token" content="{!! csrf_token() !!}" /> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="{{asset('js/products-ajax.js')}}"></script>
	
</body>

</html>