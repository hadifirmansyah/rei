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
								<h4 class="panel-title">List Of Categories</h4>
								<div class="right">
									<a href="{{ route('admin.categories.create') }}"><i class="fa fa-plus" style="font-size:20px;"></i></a>
								</div>
							</div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>Category</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-pencil"></i></button></a>
                                                    <a class="delete" href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-trash"></i></button></a>
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
