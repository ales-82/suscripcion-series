@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')
<div class="container text-white">
	<div class="row">
		<div class="my-5">			
			<h2>SUSCRIPCION CONTRATADO</h2>			
			<hr>
			@if (session('wrong'))
			    <div class="alert alert-secondary text-center fw-bolder">
			        {{ session('wrong') }}
			    </div>
			@endif
			@if (session('success'))
			    <div class="alert alert-success text-center fw-bolder">
			        {{ session('success') }}
			    </div>
			@endif

			@if(count($sale)>0)
			<div class="table-responsive">
				<table class="table table-dark table-striped">
					<thead class="text-center">
					    <tr>
					      <th scope="col">id</th>
					      <th scope="col">Plan Contratado</th>
					      <th scope="col">Pago</th>
					      <th scope="col">Fecha de contrato</th>
					      <th scope="col">Acciones</th>
					    </tr>
				  	</thead>
				  	 <tbody class="table-group-divider text-center">
					   <tr>
					    @foreach($sale as $s)	
					      <td>{{$s->id}}</th>
					      <td>{{$s->nombre_producto}}</td>
					      <td>$ {{$s->pago_suscripcion}}</td>
					      <td>{{$s->created_at->format("Y-m-d")}}</td>
					      <td>
					      	<a href="{{ route('edit.producto', $producto[0]->id) }}" class="btn btn-warning">Cambiar Plan</a>
					      	<a href="{{ route('cancelar.plan') }}" class="btn btn-danger">Cancelar</a>					      	
					      </td>
					    @endforeach
				    	</tr>				    
				  	</tbody>
				</table>
			</div>
			@else
			<h3 class="h2 btn-danger p-3">No tiene suscripciones</h3>
			@endif	
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<a href="{{ route('home') }}" class="btn btn-success">HOME</a>
		</div>
	</div>
</div>
@endsection
