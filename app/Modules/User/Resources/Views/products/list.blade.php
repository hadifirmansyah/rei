<div class="row">
    @foreach($products as $product)
        <!-- Single Product -->
        <div class="col-md-3">
            <div class="single-product-wrapper">
                <!-- Product Image -->
                <div class="product-img">
                    <img src="{{ asset('storage/product_images/'.$product->images[0]['image']) }}" alt="">
                    <!-- Hover Thumb -->
                    <img class="hover-img" src="img/product-img/product-2.jpg" alt="">

                    <!-- Product Badge -->
                    <div class="product-badge offer-badge">
                        <span>-{{ $product['discount'] }}%</span>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="product-description">
                    <span>{{ $product->category['name'] }}</span>
                    <a href={{ route('products.show', ['id' => $product['id'] ]) }}>
                        <h6>{{ $product['name'] }}</h6>
                    </a>
                    <p class="product-price">{!! $product['discount'] > 0? '<span class="old-price">Rp '.$product['price'].'</span>' : '' !!} RP {{ number_format(get_price($product['price'], $product['discount']),2,",",".") }}</p>

                    <!-- Hover Content -->
                    <div class="hover-content">
                        <!-- Add to Cart -->
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
                                {{ Form::submit(($product['stock'] > 0 ? 'Add to cart' : 'Sold Out'), ['class' => 'btn btn-block essence-btn', ($product['stock'] > 0 ? '' : 'disabled')]) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
