@extends('frontend.layout')
@section('content')
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h5>Winter Fasion</h5>
                                    <h1>Fashion Collection 2019</h1>
                                    <a href="#" class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="new_arrival section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>new arrival</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container">
                        @foreach($products as $product)
                            <div class="single_arrivel_item weidth_1 mix shoes men">
                                <img src="{{asset('images/product/'.$product->image)}}" alt="#">
                                <div class="hover_text">
                                    <p>Canvas</p>
                                    <a href="single-product.html"><h3>{{$product->name}}</h3></a>
                                    <h5>$150</h5>
                                    <div class="social_icon">
                                        <a href="#"><i class="ti-heart"></i></a>
                                        <a href="#"><i class="ti-bag"></i></a>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{route('frontend.index')}}" class="btn btn-primary mt-3">Add to cart</a>
                                    <a href="#" class="btn btn-primary mt-3">Wislisht</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection