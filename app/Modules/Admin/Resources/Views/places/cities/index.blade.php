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
								<h4 class="panel-title">List Of Cities</h4>
								<div class="right">
									<a href="{{ route('admin.places.cities.create') }}"><i class="fa fa-plus" style="font-size:20px;"></i></a>
								</div>
							</div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>City Name</th>
											<th>Province Name</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $city)
                                            <tr>
                                                <td>{{ $city->name }}</td>
                                                <td>{{ $city->province->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.places.cities.edit', ['id' => $city->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-pencil"></i></button></a>
                                                    <a class="delete" href="{{ route('admin.places.cities.destroy', ['id' => $city->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-trash"></i></button></a>
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
