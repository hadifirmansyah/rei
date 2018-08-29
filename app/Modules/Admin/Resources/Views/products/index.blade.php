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
								<h4 class="panel-title">List Of Products</h4>
								<div class="right">
									<a href="{{ route('admin.products.create') }}"><i class="fa fa-plus" style="font-size:20px;"></i></a>
								</div>
							</div>
							<hr>
							<div class="panel-body">
								<table id="table" class="table table-bordered display">
									<thead>
										<tr>
											<th>Product Code</th>
											<th>Name</th>
											<th>Category</th>
											<th>Price</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-pencil"></i></button></a>
                                                    <a class="delete" href="{{ route('admin.products.destroy', ['id' => $product->id]) }}"><button type="button" class="button-action"><i class="lnr lnr-trash"></i></button></a>
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
