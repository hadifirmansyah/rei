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
                                <h4 class="panel-title">Edit City</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['route' => ['admin.places.cities.update', $city['id']], 'files' => true, 'method' => 'put']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('province_id', 'Province', ['class' => 'control-label']) }}
                                                {{ Form::select('province_id', $provinces, $city['province_id'], ['placeholder' => 'Pick a Province', 'id' => 'province_id', 'class' => 'form-control']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('name', 'City Name', ['class' => 'control-label']) }}
                                                {{ Form::text('name', $city['name'], ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'City Name']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <a href="{{ route('admin.places.cities.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>                                                
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

@include('admin::places.cities.scripts.create')

