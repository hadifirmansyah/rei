@extends('user::layouts/master')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/breadcumb.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>OUR COLLECTION</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>{{ $products->count() }}</span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           
                            @foreach($products as $product)
                                <!-- Single Product -->
                                <div class="col-md-">
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
                                                        {{ Form::submit('Add to cart', ['class' => 'btn btn-block essence-btn']) }}
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{-- <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
@endsection

@include('user::purchasing.scripts.cart')
