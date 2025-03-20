@section('title','Noticias')
@extends('template.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('main')
<section>
	<div class="content mb-4">
		<div class="container">
			<h2 class="H3 text-center text-white pt-4">
				NOTICIAS & REVIEWS
			</h2>	
			<hr class="text-white">
		</div>				
		
		<div class="container py-5">			
			<div class="row">
				@foreach($news as $noti)
				<div class="col-12 col-sm-12 border p-2 rounded  text-white mb-2">
					<div class="row g-0">
						<div class="col-12 col-sm-4 col-md-2">
							<img src="{{$noti->imagen}}" alt="{{$noti->titulo}}" style="height: 200px; object-fit: cover;" class="img-thumbnail mx-auto" width="150">
						</div>
						<div class="col-12 col-sm-8 col-md-10">
							<article class="card-body">
								<h3 class="card-title h5 border-bottom fw-bold">
									{{$noti->titulo}}
								</h3>
								<p class="card-text-text-sm fw-bold overflow-auto" style="height: 100px;">
									{{$noti->resumen}}
								</p>								
								<div class="d-flex flex-wrap align-content-end justify-content-between">
									<div class="card-text">
										Publicado desde <small class="fw-bold">{{$noti->updated_at}}</small>
									</div>
									<div>
										<a href="{{ route('articulo',$noti->slug) }}" class="btn btn-success btn-sm">Leer más</a>
									</div>
								</div>
							</article>
						</div>				
					</div>
				</div>
				@endforeach			
			</div>
			<!--Paginación-->
		</div>
	</div>		

	
</section>


@endsection