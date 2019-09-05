@extends('client.layouts.main')

@section('content')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="assets/client/img/login.jpg" alt="">
						<div class="hover">
							<h4>Aldready have account?</h4>
							<a class="primary-btn" href="/login">login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register</h3>
						<form class="row login_form" action="{{ route('register') }}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                @if ($errors->has('name'))
                                    <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                @if ($errors->has('email'))
                                    <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                @if ($errors->has('password'))
                                    <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re Password'">
                                @if ($errors->has('repassword'))
                                    <span class="error" style="color: red;font-size: 1rem;">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
@endsection