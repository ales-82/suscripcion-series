@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')
<section class="text-white text-center">
			<h2 class="h2 m-5 pb-3 border-bottom">CAMBIA DE PLAN</h2>
			<div class="container">
				<div class="row d-flex justify-content-center">
					@foreach($prod as $pro)
					<div class="col-lg-3">
						{{$pro->nombre}}
						<div class="p-5 rounded bg-c">
							<h3 class="h2">{{ $pro->periodo }}</h2>
							<h4 class="h3">$ {{ $pro->precio }}</h3>
							<a href="{{route('cambiar.plan',$pro->id)}}" class="btn btn-primary btn-block w-75 ">Suscribirse</a>
						</div>
					</div>
					@endforeach									
				</div>
			</div>
		</section>
@endsection