@extends('client.layouts.main')

@section('content')
        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Checkout</h1>
                        <nav class="d-flex align-items-center">
                            <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                            <a href="#">Checkout</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <!--================Checkout Area =================-->
        <section class="checkout_area section_gap">
            <div class="container">
                <div class="billing_details">
                    <form class="row contact_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                @if (count($user->customer) > 0)
                                    <h3>Billing Details</h3>
                                    @foreach ($user->customer as $customer)
                                        <div class="col-md-6 form-group p_star">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control name" id="name" name="name" value="{{ $customer->user->name }}">
                                                <input type="text" class="form-control idUser" id="idUser" name="idUser" value="{{ $customer->idUser }}" hidden>
                                            </div>
                                            <div class="col-md-6 form-group p_star">
                                                <label for="phoneNumber">Phone Number</label>
                                                <input type="text" class="form-control phone" id="phoneNumber" name="phoneNumber" value="{{ $customer->phone }}">
                                            </div>
                                            <div class="col-md-6 form-group p_star">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control email" id="email" name="email" value="{{ $customer->email }}">
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control address" id="address" name="address" value="{{ $customer->address }}">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <div class="creat_account">
                                                    <h3>Shipping Details</h3>
                                                    <input type="checkbox" id="f-option3" name="selector">
                                                    <label for="f-option3">Ship to a different address?</label>
                                                </div>
                                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                                            </div>
                                @endforeach
                                @else
                                    <h3>Please update your infomation</h3>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Your Order</h2>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carts as $cart)
                                                    <tr>
                                                        <td>
                                                            {{ $cart->name }}
                                                        </td>
                                                        <td>
                                                            {{ $cart->qty }}
                                                        </td>
                                                        <td>
                                                            ${{ number_format($cart->subtotal()) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    <ul class="list list_2">
                                        <li><a href="#">Subtotal <span class="total">${{ number_format(Cart::subtotal()) }}</span></a></li>
                                    </ul>
                                    <div class="payment_item">
                                        <div class="radion_btn">
                                            <input type="radio" id="f-option5" name="selector">
                                            <label for="f-option5">Check payments</label>
                                            <div class="check"></div>
                                        </div>
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                            Store Postcode.</p>
                                    </div>
                                    <div class="payment_item active">
                                        <div class="radion_btn">
                                            <input type="radio" id="f-option6" name="selector">
                                            <label for="f-option6">Paypal </label>
                                            <img src="img/product/card.jpg" alt="">
                                            <div class="check"></div>
                                        </div>
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                            account.</p>
                                    </div>
                                    <div class="primary-btn checkout">Proceed</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================End Checkout Area =================-->

@endsection
