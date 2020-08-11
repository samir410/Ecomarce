@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Customer details</h2>
					
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>User name</th>
								  <th>phone number</th>
								  <th>Address</th>
							  </tr>
						  </thead>
						  <!--show catagory-->  
						  <tbody>
							<tr>
							@foreach($order_by_id as $vorder)
						     @endforeach
								<td> {{$vorder->shiping_first_name}}</td>
								<td> {{$vorder->shiping_mobile_number}}</td>
								<td> {{$vorder->shiping_address}}</td>
							<!----->
							</tr>

						  </tbody>
				

					  </table>            
					</div>
	</div><!--/span-->
    <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
					
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order id</th>
								  <th>product name</th>
								  <th>Order total</th>
							  </tr>
						  </thead>
						  <!--show catagory-->  
						  <tbody>
						  @foreach($order_by_id as $vorder)
							<tr>
								<td>{{$vorder->order_id}}</td>
								<td>{{$vorder->product_name}}</td>
								<td>{{$vorder->order_total}}</td>

							<!----->
							</tr>
							@endforeach

						  </tbody>
				

					  </table>            
					</div>
	</div><!--/span-->
@endsection