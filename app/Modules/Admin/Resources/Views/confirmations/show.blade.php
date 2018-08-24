@extends('admin::layouts/master')

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- PANEL HEADLINE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Confirmation Detail</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <ul class="list-unstyled list-justify">
                                    <li>Name <span>{{ $confirmation['name'] }}</span></li>
                                    <li>Amount <span>{{ $confirmation['amount'] }}</span></li>
                                    <li>Date <span>{{ $confirmation['created_at'] }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                        <a href="{{ route('admin.purchasings.show', ['id' => $confirmation['purchasing_id']]) }}" class="btn btn-block btn-primary">Check Order</a>                                                
                    </div>
                    <div class="col-md-6">
                        <!-- PANEL HEADLINE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Image</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <img style="width: 100%;" src="{{ asset('storage/confirmation_images/'.$confirmation['image']) }}" alt="">
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                    </div>
                </div>        
            </div>
        </div>
    </div>
@endsection