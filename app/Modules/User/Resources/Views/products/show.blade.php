@extends('user::layouts/master')

@section('content')
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                @if(!empty($product->images))
                    @foreach($product->images as $image)
                        <img src="{{ asset('storage/product_images/'.$image['image']) }}" alt="">                        
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>{{ $product->category['name'] }}</span>
            <a href="cart.html">
                <h2>{{ $product['name'] }}</h2>
            </a>
            <p class="product-price"><span class="old-price">$65.00</span> Rp {{ number_format($product['price'],2,",",".") }}</p>
            <p class="product-desc">{{ $product['description'] }}</p>

            <!-- Form -->
            {!! Form::open(['route' => 'cart.store', 'class' => 'cart-form clearfix']) !!}   
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
    </section>
    <!-- ##### Single Product Details Area End ##### -->
@endsection

@include('user::purchasing.scripts.cart')
