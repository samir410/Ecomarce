@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Order details</a> 
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
					
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order id</th>
								  <th>Customer name</th>
								  <th>Order total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <!--show catagory-->
						  @foreach(  $all_order_info as $vorder)   
						  <tbody>
							<tr>
								<td>{{ $vorder->order_id }}</td>
								<td class="center">{{ $vorder->customer_name }}</td>
								<td class="center">{{ $vorder->order_total }}</td>
                                <td>{{ $vorder->order_status }}</td>
							<!----->

								<td class="center">
							  
									<a class="btn btn-danger" href="{{URL::to('/unactive/'.$vorder->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
							
									<a class="btn btn-success" href="{{URL::to('/active/'.$vorder->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
							
									<a class="btn btn-info" href="{{URL::to('/view-order/'.$vorder->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete/'.$vorder->order_id)}}" id="delete">
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