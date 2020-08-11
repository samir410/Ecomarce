@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p>Please fillup form.........</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shiping details</p>
							<div class="form-one">
								<form action="{{url('/save-shiping-details')}}" method="post">
								{{csrf_field()}}
									<input type="text" name="shiping_mail" placeholder="Email">
									<input type="text" name="shiping_first_name" placeholder="First name">
									<input type="text" name="shiping_last_name" placeholder="Last name">
									<input type="text" name="shiping_address" placeholder="Address">
                                    <input type="text" name="shiping_mobile_number" placeholder="Number">
                                    <input type="text" name="shiping_city" placeholder="City">
                                    <input type="Submit" class="btn btn-warnin" value="Confirm">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section>
@endsection