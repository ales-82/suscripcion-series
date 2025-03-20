@section('title','dashboard')
@extends('admin.dashboard.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('content')	
<div class="container mt-5">
	<h2 class="h2 text-center py-2">GRAFICOS ESTADISTICOS</h2>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Compras</div>
				<div class="card-body">
					<div>
  						 {!! $usersChart->container() !!}
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6">
				<div class="card">
					<div class="card-header">Usuarios</div>
					<div class="card-body">
						<div>
							 {!! $usersChart1->container() !!}
						</div>
					</div>
				</div>
			</div>
	</div>

</div>
@endsection
@section('javascript')
	{{-- ChartScript --}}
	@if($usersChart)
		{!! $usersChart->script() !!}
		{!! $usersChart1->script() !!}
 	@endif
@endsection