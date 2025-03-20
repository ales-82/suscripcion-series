@extends('admin.dashboard.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('content')
<style>
	.file-upload .square {
    height: 250px;
    width: 250px;
    margin: auto;
    vertical-align: middle;
    border: 1px solid #e5dfe4;   
    border-radius: 5px;
}
</style>
	<div class="container my-5 border rounded p-3 ">
		<div class="row">
			<div class="col-12">
				<div class="mt-4">
					<h2>Perfil: {{$user[0]->usuario}}.</h2>
					<hr>
				</div>				
				<div class="row">
					<div class="col-lg-4 text-center">
						<div class="px-4 py-5 rounded">
							<div class="row g-3">
								<div class="mb-4 mt-0">										
									<div class="text-center">
										<div class="square position-relative display-2 mb-3">
											@if(isset($usuario[0]->imagen))
												<img src="{{ $usuario[0]->imagen }}" alt="usuario" width="100%" class="position-absolute top-50 start-50 translate-middle text-secondary border">
											@else
												<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 mb-5 mb-xxl-0">
						<div class="row g-3">
							<h3>Datos Personales</h3>
							<div class="col-md-6">
								<label for="" class="form-label">Nombre: {{$user[0]->nombre}}</label>
							</div>
							<div class="col-md-6">
								<label for="" class="form-label">Apellido: {{$user[0]->apellido}}</label>
							</div>
							<div class="col-md-6">
								<label for="" class="form-label">Teléfono: {{$user[0]->telefono}}</label>
							</div>
							<div class="col-md-6">
								<label for="" class="form-label">Domicilio: {{$user[0]->domicilio}}</label>
							</div>
							<div class="col-md-6">
								<label for="" class="form-label">Email: {{$user[0]->email}} </label>
							</div>							
						</div>
					</div>					
				</div>					
			</div>
		</div>
		<div class="row">
			<h3>Historial de Suscripciones</h3> 
			@if(isset($historial))
			<div class="table-responsive text-white">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">id</th>
				      <th scope="col">Suscripcion</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Fecha de Alta</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($historial as $hist)
				    <tr>
				      <td>{{$hist->id}}</th>
				      <td>{{$hist->nombre_producto}}</td>
				      <td>{{$hist->estado}}</td>
				      <td>{{$hist->created_at}}</td>
				    </tr>				   
				    @endforeach
				  </tbody>
				</table>
			</div>
			@else
			<div>No tiene ningun plan contratado</div>
			@endif
		</div>		
	</div>
@endsection