@extends('frontend.layout')
@section('content')
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / checkout</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout_area section_padding">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="{{ route('order.add') }}" method="post" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="cart_data"
                                   value="{{  json_encode($cart->items) }}">
                            <input type="hidden" name="cart_total"
                                   value="{{$cart->totalPrice}}">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city"/>
                                <span class="placeholder" data-placeholder=""></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="state" name="state"/>
                                <span class="placeholder" data-placeholder=""></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="country" name="country"
                                       placeholder=""/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone_number"/>
                                <span class="placeholder" data-placeholder=""></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Proceed to checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection