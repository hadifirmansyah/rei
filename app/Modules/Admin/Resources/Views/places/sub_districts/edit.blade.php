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
                                <h4 class="panel-title">Edit Sub District</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['route' => ['admin.places.sub_districts.update', $sub_district['id']], 'files' => true, 'method' => 'put']) !!}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('city_id', 'Province', ['class' => 'control-label']) }}
                                                {{ Form::select('city_id', $cities, $sub_district['city_id'], ['placeholder' => 'Pick a Province', 'id' => 'city_id', 'class' => 'form-control']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Sub District Name', ['class' => 'control-label']) }}
                                                {{ Form::text('name', $sub_district['name'], ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Sub District Name']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    {{ Form::label('charges', 'Charges', ['class' => 'control-label']) }}
                                                    {{ Form::text('charges', $sub_district['charges'], ['id' => 'charges', 'class' => 'form-control', 'placeholder' => 'Sub District Charges']) }}
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-right">
                                        <a href="{{ route('admin.places.sub_districts.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>                                                
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

@include('admin::places.sub_districts.scripts.create')

