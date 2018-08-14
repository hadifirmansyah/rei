@extends('admin::layouts.master')

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- PANEL HEADLINE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Edit Product</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['route' => ['admin.products.update', $product->id], 'files' => true, 'id' => 'form-edit', 'method' => 'put']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
                                                {{ Form::text('name', $product->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('price', 'Price', ['class' => 'control-label']) }}
                                                {{ Form::text('price', $product->price, ['id' => 'price', 'class' => 'form-control', 'placeholder' => 'Price']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('category_id', 'Category', ['class' => 'control-label']) }}
                                                {{ Form::select('category_id', $categories, $product->category_id, ['placeholder' => 'Pick a Category', 'id' => 'category_id', 'class' => 'form-control']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('discount', 'Discount', ['class' => 'control-label']) }}
                                                {{ Form::number('discount', $product->discount, ['id' => 'discount', 'class' => 'form-control', 'placeholder' => 'Discount', 'min' => '0', 'max' => '100']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                                                {{ Form::textarea('description', $product->description, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="product-images">
                                            <div class="form-group">
                                                {{ Form::label('product_images', 'Product Images', ['class' => 'control-label']) }}
                                                <div class='image-group'>
                                                    <div id='image-group-preview'>
                                                        @foreach ($product->images as $key => $image)
                                                            <div id="image-group-{{ $key }}" class='image-preview' data-id="{{ $image['id'] }}" data-index="{{ $key }}">
                                                                <input class='input-images-product' id='input-image-{{ $key }}' data-index="{{ $key }}" name='images[]' type='file' accept="image/x-png, image/gif, image/jpeg">
                                                                <img class="image-preview-display" src="{{ asset('storage/product_images/'.$image['image']) }}" id="image-preview-display-{{ $key }}"> 
                                                                <span class="image-product-remove remove-before" id="image-product-remove-{{ $key }}">x</span>
                                                                {{-- onclick="$('#image-group-{{ $key }}').remove()" --}}
                                                            </div>
                                                        @endforeach
                                                        <div id="image-group-{{ count($product->images) }}" class='image-preview'>
                                                            <input class='input-images-product' id='input-image-{{ count($product->images) }}' data-index="{{ count($product->images) }}" name='images[]' type='file' accept="image/x-png, image/gif, image/jpeg">                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <a href="{{ route('admin.products.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>                                                
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin::products.scripts.create')

