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
					<a href="{{URL::to('/edit_product')}}">update product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
                    <
                        <h2><i class="halflings-icon edit" style="background-color:blue"></i><span class="break"></span> <a href="{{URL::to('/update-product')}}">update product</a> </h2>
                   
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<p class="alert-success">
						<?php
						$massage=Session::get('massage');
						if($massage){
							echo $massage;
							Session::put('massage',null);
						}
						?>
						
						</p>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-product',$product_info->product_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
						  <fieldset>
							<div class="control-group">
                            
							  <label class="control-label" for="date01">Product name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required="">
							  </div>
                            </div> 
                           <!--catagorye-->
                            <div class="control-group">
                            <label class="control-label" for="selectError3">Product catagory</label>
								<div class="controls">
								  <select id="selectError3" name="catagory_id">
                                  <option>Select catagory</option>

                                   <?php
                                         $all_published_catagory=DB::table('tbl_catagory')
                                            ->where('publication_status',1) 
                                            ->get();
                                    foreach($all_published_catagory as $vcatagory){ ?>         
                                    <option  value="{{$vcatagory->catagory_id}}">{{$vcatagory->catagory_name}}</option>
                                    <?php } ?>
								  </select>
								</div>
                              </div>
                            <!--manufacture-->
                              <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
                                    <option>Select manufacture</option>
                                    <?php
                                         $all_published_manufacture=DB::table('tbl_manufacture')
                                            ->where('publication_status',1) 
                                            ->get();
                                    foreach($all_published_manufacture as $vmanufacture){ ?>        
                                       <option  value="{{$vmanufacture->manufacture_id}}">{{$vmanufacture->manufacture_name}}</option>
                                    <?php } ?>
                                    
								  </select>
								</div>
							  </div> 

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short describtion</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_describtion" required="" ></textarea>
							  </div>
                            </div>
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long describtion</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_describtion" required="" ></textarea>
							  </div>
                            </div>


                            <div class="control-group">
							  <label class="control-label" for="date01">Product price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="">
							  </div>
                            </div>  
                            <div class="control-group">
							  <label class="control-label" for="fileInput">image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image"  id="fileInput" type="file">
							  </div>
							</div>    
                           
                            <div class="control-group">   
                               <label class="control-label" for="date01">Product quantity</label>
                              <div class="controls">
                                 <input type="text" class="input-xlarge" name="product_quantity" required="">
                               </div>
                            </div>

                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">publication review</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1" ></textarea>
							  </div>
                            </div>
                            
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection()