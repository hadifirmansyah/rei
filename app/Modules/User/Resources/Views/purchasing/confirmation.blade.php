@extends('user::layouts/master')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/breadcumb.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Confirmation</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mt-30">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="checkout_details_area clearfix">
                        {!! Form::open(['route' => 'purchasings.confirmation.store', 'id' => 'form-confirmation']) !!}
                            {{ Form::hidden('purchasing_id', $purchasing['id'], ['id' => 'purchasing_id']) }}                                                                
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
                                        {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) }}
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('amount', 'Amount', ['class' => 'control-label']) }}
                                        {{ Form::text('amount', null, ['id' => 'amount', 'class' => 'form-control', 'placeholder' => 'Amount']) }}
                                    </div>
                                </div>
                                <div class="col-12 mb-6">
                                    <div class="form-group">
                                        {{ Form::label('image', 'Image', ['class' => 'control-label']) }}
                                        <input class='form-control' name='image' type='file' accept="image/x-png, image/gif, image/jpeg">                                                            
                                    </div>
                                </div>
                            </div>
                            <br>
                            {!! Form::submit('Confirmation', ['class' => 'btn btn-block essence-btn mb-30']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection

@include('user::purchasing.scripts.confirmation')