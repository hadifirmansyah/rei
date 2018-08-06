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
							</div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>User</th>
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
		</div>
	</div>
@endsection
