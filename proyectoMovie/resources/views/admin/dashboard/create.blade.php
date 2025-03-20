@section('title','crear-noticia')
@extends('admin.dashboard.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('content')
<section class="container w-75">
	@if(session('error'))
	<p class="bg-danger py-2 text-white text-center rounded mt-2">{{ session('error') }}</p>
	@endif
	<h2 class="h2 text-center bg-secondary text-white rounded mt-2">PUBLICACION NUEVA</h2>
	<form action="{{route('abm-noticias.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group my-3">
			<label for="" class="fw-folder">TITULO</label>
			<input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">
			@error('titulo')
			<p class="text-white bg-danger mt-1">{{ $message }}</p>
			@enderror
		</div>
		<div class="form-group my-3">
			<label for="" class="fw-older">SINOPSIS</label>
			<textarea name="resumen" cols="30" rows="2" class="form-control">{{ old('resumen') }}</textarea>
			@error('resumen')
			<p class="text-white bg-danger mt-1">{{ $message }}</p>
			@enderror
		</div>
		<div class="form-group my-3">
			<label for="" class="fw-folder">CONTENIDO</label>
			<textarea name="contenido" cols="30" rows="3" class="form-control">{{ old('contenido') }}</textarea>
			 <!--<p class="alert alert-warning text-sm" style="font-size: 12px">Un consejo desea hacer párrafos, solo tabule con el teclado solo una vez, no deje mucho espacio si no se cortara toda la información del contenido lo cual no será completa</p>-->
			 @error('contenido')
			<p class="text-white bg-danger mt-1">{{ $message }}</p>
			@enderror
		</div>
		<div class="form-group my-3">
			<label for="" class="fw-folder">AGREGAR IMAGEN</label>
			<input type="file" name="imagen" class="form-control fw-bolder"> 
			@error('imagen')
			<p class="text-white bg-danger mt-1">{{ $message }}</p>
			@enderror
		</div>
		  <div class="form-group text-center pt-3">
	    	<input type="submit" class="btn btn-success" value="Publicar">	
	    </div>	   		
	</form>
</section>
@endsection