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
                                <h4 class="panel-title">Add New Product</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'admin.products.store', 'files' => true]) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
                                                {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('price', 'Price', ['class' => 'control-label']) }}
                                                {{ Form::text('price', null, ['id' => 'price', 'class' => 'form-control', 'placeholder' => 'Price']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('category_id', 'Category', ['class' => 'control-label']) }}
                                                {{ Form::select('category_id', $categories, null, ['placeholder' => 'Pick a Category', 'id' => 'category_id', 'class' => 'form-control']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('discount', 'Discount', ['class' => 'control-label']) }}
                                                {{ Form::number('discount', 0, ['id' => 'discount', 'class' => 'form-control', 'placeholder' => 'Discount', 'min' => '0', 'max' => '100']) }}
                                            </div>
                                            <input type="hidden" name="product_code" value="1">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                                                {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="product-images">
                                            <div class="form-group">
                                                {{ Form::label('product_images', 'Product Images', ['class' => 'control-label']) }}
                                                <div class='image-group'>
                                                    <div id='image-group-preview'>
                                                        <div id="image-group-0" class='image-preview'>
                                                            {{-- <input class='image-preview-int' id='image-preview-int' onchange="previewFileimg('image-preview-int')" name='input' type='file' accept="image/x-png, image/gif, image/jpeg"/> --}}
                                                            <input class='input-images-product' id='input-image-0' data-index="0" name='images[]' type='file' accept="image/x-png, image/gif, image/jpeg">                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="place-add" name="total-logo" value="1">
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
