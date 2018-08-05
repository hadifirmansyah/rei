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
                                <h4 class="panel-title">Edit Category</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                {!! Form::open(['route' => ['admin.categories.update', $category->id], 'method' => 'put']) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Category', ['class' => 'control-label']) }}
                                                {{ Form::text('name', $category->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Category Name']) }}
                                            </div>
                                            <div class="form-right">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <a href="{{ route('admin.categories.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>                                                                                                
                                            </div>
                                        </div>
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

@include('admin::categories.scripts.create')
