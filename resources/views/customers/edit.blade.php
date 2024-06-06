@extends('layouts.app')

@section('title','Edit Customer')

@section('content')

<div class="content-wrapper" style="background-color: #F5F7F8">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" style="background-color: #495E57">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('customers.update',$customer)}}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">{{$customer->name}}
										<div class="form-group label-floating">
                                            <label class="control-label">First Name<strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="first_name" placeholder="Example, Name" autocomplete="off" value="{{$customer->first_name}}" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Last Name<strong style="color:red;"></strong></label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Example, Name" autocomplete="off" value="{{$customer->last_name}}">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email<strong style="color:red;">(*)</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com" autocomplete="off" value="{{$customer->email}}" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phone number<strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="phone_number" placeholder="0800" autocomplete="off" value="{{$customer->phone_number}}" required>
                                        </div>
										<label class="control-label">Address<strong style="color:red;">(*)</strong></label>
                                        <div class="form-group label-floating">
                                            <div style="display:flex;">
										        <textarea class="form-control" name="address" rows="2" placeholder="Enter address" value="{{$customer->address}}">{{ old('address', $customer->address) }}</textarea>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
								<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-block" style="background-color: #40A578;">Edit</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block">Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection