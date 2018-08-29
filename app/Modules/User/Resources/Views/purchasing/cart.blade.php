@extends('user::layouts/master')

@section('head')
	{{ Html::style('assets/front/css/cart.css') }}       
@endsection

@section('content')
    <div class="wrap cf">
        <h1 class="projTitle"></h1>
        <div class="heading cf col-md-12">
            <h1>Shopping Cart</h1>
            <a href="{{ route('products.index') }}" class="essence-btn" style="float: right; text-align: right;">Continue Shopping</a>
        </div>
        <div class="cart">
            @include('flash::message')            
            <ul class="cartWrap">
                @php
                    $total = 0;
                @endphp
                @foreach($carts as $cart)
                    <li class="items even">
                        <div class="infoWrap"> 
                            <div class="cartSection">
                                <img src="{{ asset('storage/product_images/'.$cart->product->images[0]['image']) }}" alt="" class="itemImg" />
                                <p class="itemNumber">#{{ $cart->product['product_code'] }}</p>
                                <h3>{{ $cart->product['name'] }}</h3>
                                <p><input type="text" class="qty" value="{{ $cart['quantity'] }}" readonly/> x Rp {{ $cart['price'] . ' (' . $cart['discount'] . '%)' }}</p>
                                <p class="stockStatus"> {{ $cart['quantity'] > $cart['product']['stock']? 'Out of Stock' : 'In Stock' }}</p>
                            </div>  
                            
                            <div class="prodTotal cartSection">
                                @php
                                    $fix_price = $cart['quantity'] * $cart['price'] - ($cart['price'] * $cart['discount'] / 100);
                                    $total += $fix_price;
                                @endphp
                                <p class="fix-price" data-price="{{ $fix_price }}">Rp {{ $fix_price }}</p>
                            </div>
    
                            <div class="cartSection removeWrap">
                                <a href="{{ route('cart.delete', ['id' => $cart['id'] ]) }}" class="remove">x</a>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <h3>Total</h3>
                        </div>  
                        
                        <div class="prodTotal cartSection" style="text-align: right; padding-right: 95px;">
                            <p>Rp <span id="total">{{ $total }} </span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <button id="btn-checkout" class="btn btn-block essence-btn">Checkout</button>
                </li>
            </ul>
        </div>
        
    </div>
@endsection

@include('user::purchasing.scripts.purchasing')
@include('user::purchasing.scripts.cart')