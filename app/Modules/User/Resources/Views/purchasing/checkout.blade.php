@extends('user::layouts/master')

@section('head')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}">    
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/breadcumb.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
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
                        {!! Form::open(['route' => 'purchasings.store', 'id' => 'form-checkout']) !!}
                            {{ Form::hidden('user_id', user()->id, ['id' => 'user_id']) }}                                                                
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('first_name', 'First Name', ['class' => 'control-label']) }}
                                        {{ Form::text('first_name', user()->first_name, ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('last_name', 'Last Name', ['class' => 'control-label']) }}
                                        {{ Form::text('last_name', user()->last_name, ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name']) }}
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="form-group">                                    
                                        <label for="province_id">Province <span>*</span></label>
                                        <select class="w-100" id="province_id" name="province_id">
                                            <option value="">Choose a Province</option>
                                            @foreach($provinces as $province)
                                                <option value="{{ $province['id'] }}"> {{ $province['name'] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="form-group">                                                                        
                                        <label for="city_id">City <span>*</span></label>
                                        {{ Form::select('city_id', ['' => 'Choose a City'], null, ['placeholder' => 'Pick a Category', 'id' => 'city_id', 'class' => 'w-100 nice-select']) }}
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="form-group">                                                                        
                                        <label for="sub_district_id">Sub District <span>*</span></label>
                                        {{ Form::select('sub_district_id', ['' => 'Choose a Sub District'], null, ['placeholder' => 'Pick a Category', 'id' => 'sub_district_id', 'class' => 'w-100 nice-select']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('charges', 'Charges', ['class' => 'control-label']) }}
                                        {{ Form::text('charges', null, ['id' => 'charges', 'class' => 'form-control', 'placeholder' => 'Generated Automatically', 'readonly' => true]) }}
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('address', 'Address', ['class' => 'control-label']) }}
                                        {{ Form::textarea('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address']) }}
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('phone_number', 'Phone Number', ['class' => 'control-label']) }}
                                        {{ Form::text('phone_number', user()->phone_number, ['id' => 'phone_number', 'class' => 'form-control', 'placeholder' => 'Phone Number']) }}
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('email_address', 'Email Address', ['class' => 'control-label']) }}
                                        {{ Form::text('email', user()->email, ['id' => 'email_address', 'class' => 'form-control', 'placeholder' => 'Email Address']) }}
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input name="cod" type="checkbox" class="custom-control-input" id="check-cod" value="1" disabled>
                                        <label class="custom-control-label" for="check-cod">Cash On Delivery<span class="note-line"> &nbsp *For Bandung Only.</span></label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="btn-checkout" class="btn btn-block essence-btn mb-30">Checkout</button>                            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection

@include('user::purchasing.scripts.checkout')