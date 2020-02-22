@extends('frontend.layout')
@section('content')
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cat_product_area section_padding border_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                            <div class="l_w_title">
                                <h3>All Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list" id="list">
                                    @foreach($categories as $category)
                                        <li data-filter="#{{$category->id}}">
                                            <a href="{{route('frontend.shop', $category->id)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        {{--<div class="col-lg-12">--}}
                            {{--<div class="product_top_bar d-flex justify-content-between align-items-center">--}}
                                {{--<div class="single_product_menu product_bar_item">--}}
                                    {{--@foreach($products as $product)--}}
                                        {{--<h2>{{$product->category->name}}</h2>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_category_product" id="{{$product->category->id}}">
                                    <div class="single_category_img">
                                        <a href="{{ route('product-detail', $product->id) }}">
                                            <img src="{{asset('images/product/'.$product->image)}}" alt="">
                                        </a>
                                        <div class="category_product_text">
                                            <a href="{{route('product-detail', $product->id)}}">
                                                <h5>{{$product->name}}</h5></a>
                                            <p>Rs. {{$product->price}}</p>
                                            <a href="#" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection