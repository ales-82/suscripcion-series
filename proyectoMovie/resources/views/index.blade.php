@section('title','Inicio')
@extends('template.template')
@section('nav')
	 @include('includes.nav')
@endsection
@section('portada')
	@include('includes.portada')
@endsection
@section('main')
	<section class="text-white text-center" id="suscripciones">
			<h2 class="h2 m-5 pb-3 border-bottom">ELIJE TU PLAN</h2>
			<div class="container">
				<div class="row">
					@foreach($products as $prod)
					<div class="col-lg-4">
						{{$prod->nombre}}
						<div class="p-5 rounded bg-c">
							<h3 class="h2">{{ $prod->periodo }}</h2>
							<h4 class="h3">$ {{ $prod->precio }}</h3>
							<a href="{{ route('producto', $prod) }}" class="btn btn-primary btn-block w-75 ">Suscribirse</a>
						</div>

					</div>
					@endforeach									
				</div>
			</div>
		</section>

@endsection