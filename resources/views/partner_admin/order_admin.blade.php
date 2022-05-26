@extends('layouts.partner.theme_partner')

@section('content')
<div class="card radius-10">
	<div class="card-header border-bottom-0 bg-transparent">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="font-weight-bold mb-0">Recent Orders</h5>
			</div>
			<div class="ms-auto">
				<button type="button" class="btn btn-white radius-10">View More</button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table mb-0 align-middle">
				<thead>
					<tr>
						<th>Photo</th>
						<th>Product Name</th>
						<th>Customer</th>
						<th>order id</th>
						<th>quantity</th>
						<th>total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($test as $item)
					@if( $item->product->partner_id == $partner_id)
					<tr>
						<td>
							<div class="product-img bg-transparent border">
								<img src="{{ url('storage/'.$item->product->photo )}}" class="p-1" alt="">
							</div>
						</td>
						<td>{{$item->product->title}} {{$item->id}}</td>
						<td>{{$item->profile->name}}</td>
						<td>{{$item->order_id}}</td>
						<td>{{$item->quantity}} ชิ้น</td>
						<td>฿ {{ number_format($item->total) }}</td>

						<td>
							@switch($item->status)
							@case('created')
							<a href="javaScript:;" class="btn btn-sm btn-warning radius-30">รอจัดส่ง</a>
							<a href="" data-toggle="modal" data-target="#order{{$item->id}}">จัดส่งสินค้า</a>

							@break
							@case('completed')
							<a href="javaScript:;" class="btn btn-sm btn-success radius-30">ส่งแล้ว</a>
							@break
							@case('cancelled')
							<a href="javaScript:;" class="btn btn-sm btn-danger radius-30">ยกเลิก</a>
							@break
							@endswitch

						</td>
					</tr>

					@endif
					
					<div class="modal fade" id="order{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">จัดส่งสินค้า</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<span>หมายเลข Tracking</span>
									<form method="POST" action="{{ url('/order-product/'. $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
										{{ method_field('PATCH') }}
										{{ csrf_field() }}
										<input class="col-12" style="border-radius: 10px;" name="tracking" type="text" id="tracking" value="" placeholder="ใส่เลข tracking...">
										<input name="status" type="hidden" id="status" value="completed">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
								</form>
							</div>
						</div>
					</div>@endforeach
					<!-- <tr>
										<td>
											<div class="product-img bg-transparent border">
												<img src="assets/images/icons/smartphone.png" class="p-1" alt="">
											</div>
										</td>
										<td>Redmi Airdts</td>
										<td>Craig Clayton</td>
										<td>#8627523</td>
										<td>$59.35</td>
										<td><a href="javaScript:;" class="btn btn-sm btn-danger radius-30">Cancelled</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="product-img bg-transparent border">
												<img src="assets/images/icons/mouse.png" class="p-1" alt="">
											</div>
										</td>
										<td>Magic Mouse 2</td>
										<td>Julia Burke</td>
										<td>#6875954</td>
										<td>$42.68</td>
										<td><a href="javaScript:;" class="btn btn-sm btn-warning radius-30">Pending</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="product-img bg-transparent border">
												<img src="assets/images/icons/tshirt.png" class="p-1" alt="">
											</div>
										</td>
										<td>Coton-T-Shirt</td>
										<td>Clark Natela</td>
										<td>#4587892</td>
										<td>$32.78</td>
										<td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="product-img bg-transparent border">
												<img src="assets/images/icons/headphones.png" class="p-1" alt="">
											</div>
										</td>
										<td>Headphones 7</td>
										<td>Robin Mandela</td>
										<td>#5587426</td>
										<td>$29.52</td>
										<td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="product-img bg-transparent border">
												<img src="assets/images/icons/mouse.png" class="p-1" alt="">
											</div>
										</td>
										<td>Magic Mouse 2</td>
										<td>Julia Burke</td>
										<td>#6875954</td>
										<td>$42.68</td>
										<td><a href="javaScript:;" class="btn btn-sm btn-warning radius-30">Pending</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="product-img bg-transparent border">
												<img src="assets/images/icons/tshirt.png" class="p-1" alt="">
											</div>
										</td>
										<td>Coton-T-Shirt</td>
										<td>Clark Natela</td>
										<td>#4587892</td>
										<td>$32.78</td>
										<td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
										</td>
									</tr> -->
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection