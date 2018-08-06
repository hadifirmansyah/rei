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
                                <h4 class="panel-title">Personal Information</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <ul class="list-unstyled list-justify">
                                    <li>First Name <span>{{ $purchasing['first_name'] }}</span></li>
                                    <li>Last Name <span>{{ $purchasing['last_name'] }}</span></li>
                                    <li>Email <span>{{ $purchasing['email'] }}</span></li>
                                    <li>Phone <span>{{ $purchasing['phone_number'] }}</span></li>
                                    <li>Created By <span>{{ $purchasing->user['first_name'] }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                    </div>
                    <div class="col-md-6">
                        <!-- PANEL HEADLINE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Shipment Information</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <ul class="list-unstyled list-justify">
                                    <li>Province <span>{{ $purchasing->sub_district->city->province['name'] }}</span></li>
                                    <li>City <span>{{ $purchasing->sub_district->city['name'] }}</span></li>
                                    <li>Sub District <span>{{ $purchasing->sub_district['name'] }}</span></li>
                                    <li>Address <span>{{ $purchasing['address'] }}</span></li>
                                    <li>Charges <span>{{ $purchasing['charges'] }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Products Information</h4>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchasing->detail as $product)
                                            <tr>
                                                <td>{{ $product->product['name'] }}</td>
                                                <td>{{ $product['quantity'] }}</td>
                                                <td>{{ $product['price'] }}</td>
                                                <td>{{ $product['discount'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button id="pay" type="button" class="btn btn-block btn-primary" data-id="{{ $purchasing['id'] }}" {{ $purchasing['status'] == 1? 'disabled' : '' }} >Set Payed</button>                        
                    </div>
                </div>        
            </div>
        </div>
    </div>
@endsection

@include('admin::purchasings.scripts.script')
