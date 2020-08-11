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
								  <th>Manufacture id</th>
								  <th>Manufacture name</th>
								  <th>Manufacture describtion</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <!--show catagory-->
						  @foreach( $all_manufacture_info as $vmanufacture)   
						  <tbody>
							<tr>
								<td>{{$vmanufacture->manufacture_id }}</td>
								<td class="center">{{ $vmanufacture->manufacture_name }}</td>
								<td class="center">{{$vmanufacture->manufacture_describtion }}</td>
								<td class="center">
								@if($vmanufacture->publication_status==1)
									<span class="label label-success">Active</span>
								@else
									<span class="label label-danger">Unactive</span>
								@endif
								</td>

								<td class="center">
							    @if($vmanufacture->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive_manufacture/'.$vmanufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
									<a class="btn btn-success" href="{{URL::to('/active_manufacture/'.$vmanufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
									<a class="btn btn-info" href="{{URL::to('/edit-manufacture/'.$vmanufacture->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete-manufacture/'.$vmanufacture->manufacture_id)}}" id="delete">
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