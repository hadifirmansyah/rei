@extends('admin::layouts/master')

@section('head')
    {{ Html::style('assets/vendor/chartist/css/chartist-custom.css') }}    
@endsection

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
								<h4 class="panel-title">Dashboard</h4>
							</div>
							<hr>
							<div class="panel-body">
								<div class="row">
                                    <div class="col-md-4">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-download"></i></span>
                                            <p>
                                                <span class="number">{{ $data['count']['products'] }}</span>
                                                <span class="title">Products</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                            <p>
                                                <span class="number">{{ $data['count']['purchasing'] }}</span>
                                                <span class="title">Sales</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-users"></i></span>
                                            <p>
                                                <span class="number">{{ $data['count']['users'] }}</span>
                                                <span class="title">Users</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- END PANEL HEADLINE -->
                    </div>
                    <div class="col-md-12">
                        <!-- VISIT CHART -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sales Summary</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                </div>
                            </div>
							<hr>                            
                            <div class="panel-body">
                                <div id="sales-chart" data-label="{{ $data['monthly']->pluck('month') }}" data-value="{{ $data['monthly']->pluck('count') }}" class="ct-chart"></div>
                            </div>
                        </div>
                        <!-- END VISIT CHART -->
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
    {{ Html::script('assets/vendor/chartist/js/chartist.min.js') }}       

    <script>
        // visits chart
		data = {
			labels: $('#sales-chart').data('label'),
			series: [
				$('#sales-chart').data('value')
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
            axisY: {
                scaleMinSpace: 100
            }
		};

		new Chartist.Bar('#sales-chart', data, options);
    </script>
@endpush
