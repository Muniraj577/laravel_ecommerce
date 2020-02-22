@extends('frontend.layout')
@section('content')
    <link rel="stylesheet" href="{{asset('css/lightslider.min.css')}}">
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home/Shop/Single product</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="product_image_area section_padding">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-5">
                    <div class="product_slider_img">
                        <div id="vertical">
                            <div data-thumb="{{asset('images/product/'.$product->image)}}">
                                @foreach($product->product_images as $product_image)
                                    <img src="{{asset('images/products/'.$product_image->image)}}"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->name}}</h3>
                        <h2>Rs. {{$product->price}}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> : {{$product->category->name}}</a>
                            </li>
                            <li>
                                @if($product->qty)
                                    <span>Availibility</span> : {{$product->qty}} In Stock
                                @else
                                    <span>Availibility</span> : Out of stock
                                @endif
                            </li>
                        </ul>
                        <p>
                            {{$product->description}}
                        </p>
                        @if($product->qty)
                            <div class="card_area">
                                <div class="product_count d-inline-block">
                                    <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" name="qty" type="text" value="1" min="0"
                                           max="{{$product->qty}}">
                                    <span class="number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <div class="add_to_cart">
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn_3">add to cart</a>
                                    <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                                </div>
                                <div class="social_icon">
                                    <a href="#" class="fb"><i class="ti-facebook"></i></a>
                                    <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
                                    <a href="#" class="li"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection