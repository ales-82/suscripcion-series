@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')	
 		@if(session('error'))
        	<p class="alert alert-danger text-center fw-bolder">{{session('error')}}</p>
    	@endif
		<section class="text-white text-center">
			<h2 class="h2 m-5 pb-3 border-bottom">Registro</h2>			
			<div class="container w-25 mx-auto">
				<div class="row">
					<span class="fw-bolder">tenes cuenta?</span>
					<a href="{{ route('login') }}" class="btn btn-success w-50 mx-auto btn-sm fw-bolder">ir a Logín</a>
					<form action="{{ route('auth') }}" method="POST" class="mt-2">
						@csrf
						<div class="mb-3">
        					<label class="form-label">Usuario</label>
        					<input type="text" name="usuario" class="form-control" value="{{old('usuario')}}">
        					@error('usuario')
						  		<p class="bg-danger py-2">{{$message}}</p>
						  	@enderror
        				</div>
	        			<div class="mb-3">
	        				<label class="form-label">Email</label>
	        				<input type="text" name="email" class="form-control" value="{{old('email')}}">
	        				@error('email')
						  		<p class="bg-danger py-2">{{$message}}</p>
						  	@enderror
	        			</div>
	        			<div class="mb-3">
	        				<label class="form-label">Password</label>
	        				<input type="password" name="password" class="form-control" value="{{ old('password') }}">
	        				@error('password')
						  		<p class="bg-danger py-2">{{$message}}</p>
						  	@enderror

	        			</div>						
						<div class="mt-4">
							<button type="submit" class="btn btn-info fw-bolder">Registrarse</button>	
						</div>					
					</form>					
				</div>					
			</div>
		</section>		
	
@endsection