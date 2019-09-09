@extends('client.layouts.main')

@section('content')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Profile</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Profile</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <!-- End Banner Area -->
    
    <section class="checkout_area section_gap">
            <div class="container">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($user->customer) > 0)
                                @foreach ($user->customer as $cus)
                                    <form class="row contact_form" action="{{ route('update-profile') }}" method="post">
                                        @csrf
                                        <div class="col-md-6 form-group p_star">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $cus->user->name }}">
                                        </div>
                                        <div class="col-md-6 form-group p_star">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $cus->phone }}">
                                        </div>
                                        <div class="col-md-6 form-group p_star">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $cus->email }}">
                                        </div>
                                        <div class="col-md-12 form-group p_star">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $cus->address }}">
                                        </div>
                                        <button class="primary-btn text-center">Submit</button>
                                    </form>
                                @endforeach
                            @else
                                <form class="row contact_form" action="{{ route('update-profile') }}" method="post">
                                    @csrf
                                    <div class="col-md-6 form-group p_star">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                        <input type="text" class="form-control" id="idUser" name="idUser" value="{{ $user->id }}" hidden>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                    <button class="primary-btn text-center">Submit</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection