@extends('admin::layouts/master')

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
                                <h4 class="panel-title">List Of Purchasings</h4>
                                <div class="right">
                                    <button type="button" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-printer"></i></button>
                                </div>
							</div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>Orderer</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Charges</th>
											<th>Phone Number</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchasings as $purchasing)
                                            <tr>
                                                <td>{{ $purchasing->user->first_name }}</td>
                                                <td>{{ $purchasing->first_name }}</td>
                                                <td>{{ $purchasing->last_name }}</td>
                                                <td>{{ $purchasing->charges }}</td>
                                                <td>{{ $purchasing->phone_number }}</td>
                                                <td>
                                                    <a href="{{ route('admin.purchasings.show', ['id' => $purchasing->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-eye"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
								</table>
							</div>
						</div>
						<!-- END PANEL HEADLINE -->
					</div>
				</div>
            </div>
            
             <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Print as Report</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('month', 'Month', ['class' => 'control-label']) }}
                                    {{ Form::select('month', get_months(), null, ['placeholder' => 'Pick a Month', 'id' => 'month', 'class' => 'form-control']) }}                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="print" type="button" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                
                </div>
            </div>
		</div>
	</div>
@endsection

@include('admin::purchasings.scripts.index')