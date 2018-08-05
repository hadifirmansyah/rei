@extends('user::layouts/master')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/breadcumb.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Create New Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80 padding-top-0">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="checkout_details_area mt-50 clearfix">
                        {!! Form::open(['id' => 'form-register', 'route' => 'register.post', 'files' => true]) !!}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('first_name', 'Firts Name', ['class' => 'control-label']) }}
                                        {{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('last_name', 'Last Name', ['class' => 'control-label']) }}
                                        {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('phone_number', 'Phone Number', ['class' => 'control-label']) }}
                                        {{ Form::text('phone_number', null, ['id' => 'phone_number', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                                        {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                                        {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('password_confirmation', 'Password Confirmation', ['class' => 'control-label']) }}
                                        {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{ Form::submit('Register', ['id' => 'btn-submit', 'class' => 'btn btn-block essence-btn']) }}                                    
                                </div>                                
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('user::auth.scripts.register')
