@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<p class="alert-success">
				<?php
				 $massage=Session::get('massage');
					if($massage){
						echo $massage;
					Session::put('massage',null);
						}
					?>
						
			</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
					
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product id</th>
								  <th>Producty name</th>
								  <th>Product describtion</th>
								  <th>Product price</th>
                                  <th>Product image</th>
                                  <th>Product quantity</th>
                                  <th>Catagory name</th>
                                  <th>Manufacture name</th>
                                  <th>Status</th>
								  <th>Actions</th>
                                  
							  </tr>
						  </thead>
						  <!--show catagory-->
						  @foreach(  $all_product_info as $vproduct)   
						  <tbody>
						    <tr>
								<td>{{ $vproduct->product_id }}</td>
								<td class="center">{{ $vproduct->product_name }}</td>
								<td class="center">{{ $vproduct->product_short_describtion }}</td>
								<td class="center">{{ $vproduct->product_price }}</td>
                                <td><img src="{{URL::to($vproduct->product_image)}}" style="height:80px; width:80px;"></td>
                                <td class="center">{{ $vproduct->product_quantity }}</td>
                                <td class="center">{{ $vproduct->catagory_name }}</td>
                                <td class="center">{{ $vproduct->manufacture_name}}</td>
                                <td class="center">
								@if($vproduct->publication_status==1)
									<span class="label label-success">Active</span>
								@else
									<span class="label label-danger">Unactive</span>
								@endif
                                </td>
					

								<td class="center">
							    @if($vproduct->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive_product/'.$vproduct->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
									<a class="btn btn-success" href="{{URL::to('/active_product/'.$vproduct->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
									<a class="btn btn-info" href="{{URL::to('/edit-product/'.$vproduct->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$vproduct->product_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>

						  </tbody>
						  @endforeach

					  </table>            
					</div>
				</div><!--/span-->
            </div><!--/row-->

@endsection