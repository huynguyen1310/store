@extends('client.layouts.main')

@section('content')
        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                        <div class="col-first">
                            <h1>Shopping Cart</h1>
                            <nav class="d-flex align-items-center">
                                <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                                <a href="category.html">Cart</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
        
            <!--================Cart Area =================-->
            <section class="cart_area">
                <div class="container">
                    <div class="cart_inner">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="img/upload/product/{{ $cart->options->img }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="media-body">
                                                        <p>{{ $cart->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>${{ $cart->price }}</h5>
                                            </td>
                                            <td>
                                                <form>
                                                    @csrf
                                                    <div class="product_count">
                                                        <input type="text" name="qty" id="sst-{{ $cart->rowId }}" maxlength="12" value="{{ $cart->qty }}" title="Quantity:"
                                                            class="input-text qty" data-id="{{ $cart->rowId }}">
                                                        <button onclick="let result = document.getElementById('sst-{{ $cart->rowId }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                            class="increase items-count" type="button" data-id="{{ $cart->rowId }}"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button onclick="let result = document.getElementById('sst-{{ $cart->rowId }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                            class="reduced items-count" type="button" data-id="{{ $cart->rowId }}"><i class="lnr lnr-chevron-down"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <h5>${{ $cart->subtotal() }}</h5>
                                            </td>
                                            <td><span class="btn btn-danger text-center delete-cart" data-id="{{ $cart->rowId }}"><i class="fas fa-trash-alt"></i></span></td>
                                        </tr>
                                    @endforeach

                                    <tr class="bottom_button">
                                        <td>
                                            <a class="gray_btn" href="#">Update Cart</a>
                                        </td>
                                        <td>
        
                                        </td>
                                        <td>
        
                                        </td>
                                        <td>
                                            <div class="cupon_text d-flex align-items-center">
                                                <input type="text" placeholder="Coupon Code">
                                                <a class="primary-btn" href="#">Apply</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
        
                                        </td>
                                        <td>
        
                                        </td>
                                        <td>
                                            <h5>Subtotal</h5>
                                        </td>
                                        <td>
                                            <h5>${{ Cart::subtotal() }}</h5>
                                        </td>
                                    </tr>
                                    <tr class="shipping_area">
                                        <td>
        
                                        </td>
                                        <td>
        
                                        </td>
                                        <td>
                                            <h5>Shipping</h5>
                                        </td>
                                        <td>
                                            <div class="shipping_box">
                                                <ul class="list">
                                                    <li><a href="#">Flat Rate: $5.00</a></li>
                                                    <li><a href="#">Free Shipping</a></li>
                                                    <li><a href="#">Flat Rate: $10.00</a></li>
                                                    <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                                </ul>
                                                <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                                <select class="shipping_select">
                                                    <option value="1">Bangladesh</option>
                                                    <option value="2">India</option>
                                                    <option value="4">Pakistan</option>
                                                </select>
                                                <select class="shipping_select">
                                                    <option value="1">Select a State</option>
                                                    <option value="2">Select a State</option>
                                                    <option value="4">Select a State</option>
                                                </select>
                                                <input type="text" placeholder="Postcode/Zipcode">
                                                <a class="gray_btn" href="#">Update Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="out_button_area">
                                        <td>
        
                                        </td>
                                        <td>
        
                                        </td>
                                        <td>
        
                                        </td>
                                        <td>
                                            <div class="checkout_btn_inner d-flex align-items-center">
                                                <a class="gray_btn" href="#">Continue Shopping</a>
                                                <a class="primary-btn" href="#">Proceed to checkout</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Cart Area =================-->
        
@endsection