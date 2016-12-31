@extends('layout')

  
  
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-3">
		
		<h3>Add a Product</h3>
		<form>			
			{{Form::token() }}
			<div class="form-group">
			<input type="text" name="name" id="name" class="form-control">
			</div>
			<div class="form-group">
			<input type="text" name="quantity" id="quantity" class="form-control">
			</div>
			<div class="form-group">
			<input type="text" name="price" id="price" class="form-control">
			</div>
			<div class="form-group">
			<button type="submit" id="add_product" class="btn btn-primary">Add Product</button>
			</div>
		</form>
		<div id="product_list">
		@foreach ($products as $product)
		  <table>
		  <tr>
		  <td class="col-md-3">
			{{ $product->name }}
		  </td>
		  <td class="col-md-2">
			{{ $product->quantity }}
		  </td>
		  <td class="col-md-2">
			{{ $product->price }}
		  </td>
		  <td class="col-md-4">
			{{ $product->created_at }}
		  </td>
		  <td class="col-md-4">
			{{ $product->total_value }}
		  </td>

		  </tr>
		  </table>
		 @endforeach		
		</div>
		<div id="total" class="col-md-2">{{ $total }}</div>
	</div>
	<script>
		var token = '{{ Session::token() }}';
		var url='{{route('product_add')}}';
	</script>
	
@stop
