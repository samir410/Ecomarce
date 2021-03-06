@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="{{URL::to('/edit-manufacture')}}">Update manufacture</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
                    <
                        <h2><i class="halflings-icon edit" style="background-color:blue"></i><span class="break"></span> <a href="{{URL::to('/update-manufacture')}}"> Update catagory</a> </h2>
                   
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<p class="alert-success">
				
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-manufacture',$manufacture_info->manufacture_id)}}" method="post">
                            {{csrf_field()}}
						  <fieldset>
							<div class="control-group">
                            
							  <label class="control-label" for="date01">Manufacture name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacture_name" value="{{$manufacture_info->manufacture_name}}">
							  </div>
                            </div>  

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Manufacture describtion</label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacture_describtion">{{$manufacture_info->manufacture_describtion}} </textarea>
							  </div>
                            </div>

                            
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add manufacture</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection()