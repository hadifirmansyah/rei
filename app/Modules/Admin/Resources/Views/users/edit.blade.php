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
                                <h4 class="panel-title">Edit User</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['id' => 'form-edit', 'route' => ['admin.users.update', $user['id']], 'files' => true, 'method' => 'put']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('first_name', 'Firts Name', ['class' => 'control-label']) }}
                                                {{ Form::text('first_name', $user['first_name'], ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'Firts Name']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                                                {{ Form::email('email', $user['email'], ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('last_name', 'Last Name', ['class' => 'control-label']) }}
                                                {{ Form::text('last_name', $user['last_name'], ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('phone_number', 'Phone Number', ['class' => 'control-label']) }}
                                                {{ Form::text('phone_number', $user['phone_number'], ['id' => 'phone_number', 'class' => 'form-control', 'placeholder' => 'Phone Number']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <a href="{{ route('admin.users.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>                                                
                                        <button id="btn-submit" type="submit" class="btn btn-primary">Submit</button>
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

@include('admin::users.scripts.create')

