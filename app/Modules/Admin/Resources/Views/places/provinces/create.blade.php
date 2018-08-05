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
                                <h4 class="panel-title">Add New Province</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'admin.places.provinces.store', 'files' => true]) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Province Name', ['class' => 'control-label']) }}
                                                {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Province Name']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <a href="{{ route('admin.places.provinces.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>                                                
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

@include('admin::places.provinces.scripts.create')

