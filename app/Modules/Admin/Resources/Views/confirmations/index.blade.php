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
								<h4 class="panel-title">List Of Confirmation</h4>
                            </div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>Name</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirmations as $confirmation)
                                            <tr>
                                                <td>{{ $confirmation->name }}</td>
                                                <td>{{ $confirmation->amount }}</td>
                                                <td>{{ $confirmation->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.confirmations.show', ['id' => $confirmation->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-eye"></i></button></a>
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

@include('admin::confirmations.scripts.script')

