@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')
<section>	
	<div class="container my-4 text-white rounded p-3">
		<div class="row">
			<div class="col-12">
				<div class="mt-2">
					<h2 class="h3 text-center pt-2">{{$art[0]->titulo}}</h2>		
					<hr class="text-white">
				</div>								
				<div class="row">
					<div class="col-lg-4 text-center">
						<div class="px-4 pt-5 rounded">
							<div class="row g-3">
								<div class="mt-0">
									<div class="text-center">
										<div class="position-relative display-2 mb-3">
											<img src="{{ $art[0]->imagen }}" alt="{{$art[0]->titulo}}" class="translate-middel text-secondary" width="100%">
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 mb-5 mb-xxl-0">
						<div class="row g-3">
							<article>
								<h3 class="border-bottom h3 fw-bolder py-2">
									Sinopsis
								</h3>
								<p>{{ $art[0]->resumen }}</p>
								<div class="d-flex justify-content-between">							
									<p>Autor: Admin </p>
									<p>Publicado desde: {{ $art[0]->created_at->format('Y-m-d') }}</p>	
								</div>
							</article>
							<a href="{{route('home')}}#suscripciones" class="btn btn-primary">Verla Ahora</a>
						</div>
					</div>
					<article class="container">
						<h3 class="border-top border-2 h3 fw-bolder py-3 mt-3">Trasfondo</h3>
						@foreach($content as $cont)
						<p>{{$cont}}</p>
						@endforeach
					</article>
				</div>
				
			</div>
		</div>	
	</div>			
</section>

@endsection
