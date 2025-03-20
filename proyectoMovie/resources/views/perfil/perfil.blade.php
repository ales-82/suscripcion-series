@section('title','perfil')
@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')
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
	@if(session('success'))
		<p class="alert alert-info">{{ session('success') }}</p>
	@endif
	<div class="container my-5 border text-white rounded p-3 ">
		<div class="row">
			<div class="col-12">
				<div class="my-5">
					<h2>Perfil: {{$usuario[0]->usuario}}.</h2>
					<hr>
				</div>
				<form action="{{ route('update-perfil',$usuario[0]->id) }}" method="POST" enctype="multipart/form-data" class="file-upload">
					@csrf
					<div class="row">
						<div class="col-lg-4 text-center">
							<div class="px-4 py-5 rounded">
								<div class="row g-3">
									<div class="mb-4 mt-0">
										Sube tu foto de perfil
										<div class="text-center">
											<div class="square position-relative display-2 mb-3">
												@if(isset($usuario[0]->imagen))
													<img src="{{ $usuario[0]->imagen }}" alt="usuario" width="100%" class="position-absolute top-50 start-50 translate-middle text-secondary border">
												@else
													<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
												@endif
											</div>
											<!--Button UpLoad File-->
											<input type="file" id="customFile" name="imagen" class="form-control mx-auto">
											<input type="hidden" name="prev_image" value="{{ $usuario[0]->imagen }}">		
											<!--Content-->
											<p class="text-muted mt-3 mb-0">
												<span class="me-1 text-white">Nota: Tamaño mínimo 300x300</span>
											</p>
											@error('imagen')
											<br>
												<span class="bg-danger text-white p-2 rounded fw-3">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8 mb-5 mb-xxl-0">
							<div class="row g-3">
								<h3>Datos Personales</h3>
								<div class="col-md-6">
									<label for="" class="form-label">Nombre:</label>
									<input type="text" class="form-control" name="nombre" value="{{ old('nombre', $usuario[0]->nombre)}}">
									@error('nombre')
									<br>
										<span class="bg-danger text-white p-2 rounded fw-3">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6">
									<label for="" class="form-label">Apellido:</label>
									<input type="text" class="form-control" name="apellido" value="{{ old('apellido', $usuario[0]->apellido)}}">
									@error('apellido')
									<br>
										<span class="bg-danger text-white p-2 rounded fw-3">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6">
									<label for="" class="form-label">Teléfono :</label>
									<input type="text" class="form-control" name="telefono" value="{{ old('telefono', $usuario[0]->telefono)}}">
									@error('telefono')
									<br>
										<span class="bg-danger text-white p-2 rounded fw-3">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6">
									<label for="" class="form-label">Domicilio :</label>
									<input type="text" class="form-control" name="domicilio" value="{{ old('domicilio', $usuario[0]->domicilio)}}">
									@error('domicilio')
									<br>
										<span class="bg-danger text-white p-2 rounded fw-3">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6">
									<label for="" class="form-label">Email : </label>
									<input type="text" class="form-control" name="email" value="{{ old('email', $usuario[0]->email)}}">
									@error('email')
									<br>
										<span class="bg-danger text-white p-2 rounded fw-3">{{ $message }}</span>
									@enderror
								</div>								
							</div>
						</div>
						
					</div>
					<div class="gap-3 d-md-flex justify-content-md-end text-center">
						<button type="submit" class="btn btn-warning btn-lg">Actualizar</button>
					</div>
				</form>				
			</div>
		</div>		
	</div>

@endsection