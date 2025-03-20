@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')
		@if(session('success'))
        	<p class="alert alert-success text-center fw-bolder">{{session('success')}}</p>
    	@endif     	 
    	@if(session('wrong'))
        	<p class="alert alert-info text-center fw-bolder">{{session('wrong')}}</p>
    	@endif     	
    	@if(session('error'))
        	<p class="alert alert-danger text-center fw-bolder">{{session('error')}}</p>
    	@endif
		<section class="text-white text-center">
			<h2 class="h2 m-5 pb-3 border-bottom">Login</h2>
			<div class="row w-25 mx-auto">
				<span class="fw-bolder">¿No tenes cuenta?</span>
				<a href="{{ route('registro') }}" class="btn btn-warning btn-sm fw-bolder border border-0">Registrate!</a>
			</div>
			<div class="container w-25 mx-auto">
				<div class="row">
					<form action="{{ route('sesion') }}" method="POST" class="mt-2">
						@csrf
						<div class="mb-3">
						  <label class="form-label">Email</label>
						  <input type="text" class="form-control" name="email" placeholder="ingrese su email" value="{{ old('email') }}">
						  @error('email')
						  		<p class="bg-danger py-2">{{$message}}</p>
						  	@enderror
						</div>
						<label for="exampleFormControlInput1" class="form-label">Password</label>
						  <input type="password" class="form-control" name="password" placeholder="ingrese su contraseña" value="{{ old('password') }}">	
						  @error('password')
						  		<p class="bg-danger py-2">{{$message}}</p>
						  	@enderror					  
						</div>
						<div class="mt-4">
							<button type="submit" class="btn btn-info fw-bolder">Acceder</button>	
						</div>					
					</form>					
				</div>					
			</div>
		</section>		
	
@endsection