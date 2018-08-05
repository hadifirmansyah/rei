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
								<h4 class="panel-title">List Of Sub Districts</h4>
								<div class="right">
									<a href="{{ route('admin.places.sub_districts.create') }}"><i class="fa fa-plus" style="font-size:20px;"></i></a>
								</div>
							</div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>Sub District Name</th>
											<th>City Name</th>
											<th>Charges</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_districts as $sub_district)
                                            <tr>
                                                <td>{{ $sub_district->name }}</td>
                                                <td>{{ $sub_district->city->name }}</td>
                                                <td>{{ $sub_district->charges }}</td>
                                                <td>
                                                    <a href="{{ route('admin.places.sub_districts.edit', ['id' => $sub_district->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-pencil"></i></button></a>
                                                    <a href="{{ route('admin.places.sub_districts.destroy', ['id' => $sub_district->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-trash"></i></button></a>
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
