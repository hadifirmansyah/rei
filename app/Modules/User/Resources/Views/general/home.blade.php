@extends('user::layouts/master')

@section('content')
    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url({{ asset('assets/front/img/bg-img/bg-2a.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <img class="logo-img" src="{{ asset('assets/img/rei.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/bg-bag.jpg') }});">
                        <div class="catagory-content">
                            <a href="#">Bags</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/bg-shoes.jpg') }});">
                        <div class="catagory-content">
                            <a href="#">Shoes</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/bg-jackets.jpg') }});">
                        <div class="catagory-content">
                            <a href="#">Jackets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix padding-top-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Newest Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach ($products as $product)
                            <!-- Single Product -->
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ asset('storage/product_images/'.$product->images[0]['image']) }}" alt="">
                                    <!-- Hover Thumb -->
                                    @if(!empty($product->images[1]['image']))
                                        <img class="hover-img" src="{{ asset('storage/product_images/'.$product->images[0]['image']) }}" alt="">
                                    @endif
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <span>{{ $product->category['name'] }}</span>
                                    <a href="{{ route('products.show', ['id' => $product['id'] ]) }}">
                                        <h6>{{ $product['name'] }}</h6>
                                    </a>
                                    <p class="product-price">{!! $product['discount'] > 0? '<span class="old-price">Rp '.$product['price'].'</span>' : '' !!} RP {{ number_format(get_price($product['price'], $product['discount']),2,",",".") }}</p>

                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <!-- Form -->
                                        {!! Form::open(['route' => 'cart.store', 'class' => 'cart-form clearfix form-cart']) !!}   
                                            {{ Form::hidden('product_id', $product['id']) }}                     
                                            {{ Form::hidden('discount', $product['discount']) }}                     
                                            {{ Form::hidden('price', $product['price']) }}                     
                                            {{ Form::hidden('user_id', user()->id?? 0) }}                     
                                            {{ Form::hidden('quantity', 1) }}                     
                                            <!-- Cart & Favourite Box -->
                                            <div class="cart-fav-box d-flex align-items-center">
                                                <!-- Cart -->
                                                {{ Form::submit('Add to cart', ['class' => 'btn btn-block essence-btn']) }}
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/front/img/core-img/brand1.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/front/img/core-img/brand2.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/front/img/core-img/brand3.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/front/img/core-img/brand4.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/front/img/core-img/brand5.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/front/img/core-img/brand6.png') }}" alt="">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->
@endsection

@include('user::purchasing.scripts.purchasing')