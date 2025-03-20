@section('title','abm-noticia')
@extends('admin.dashboard.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('content')
	@if(session('delete'))
       	<p class="alert alert-success text-center">{{session('delete')}}</p>
    @endif
	<div class="mb-5">
		<div class="container">
			<h2 class="h2 text-center pt-2 border-bottom">
			ABM DE NOTICIAS
			</h2>
			<div id="message"></div>
			<div class="d-flex flex-row justify-content-end">
				<a href="{{ route('abm-noticias.create') }}" class="btn btn-primary mb-2 mt-3">
					Nuevo
				</a>
			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead class="text-center">
						<tr class="table-dark">
							<th scope="col">IMAGEN</th>
							<th scope="col">TITULO</th>
							<th scope="col">RESUMEN</th>
							<th colspan="2">ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						@foreach($noticias as $news)
						<tr>
							<td>
								<img src="{{$news->imagen}}" alt="serie" width="100">
							</td>
							<td>{{$news->titulo}}</td>
							<td class="overflow-auto " style="height: 100px;">
								{{$news->resumen}}
							</td>
							<td><a href="{{ route('abm-noticias.edit',$news) }}" class="btn btn-warning">Editar</a></td>
							<td><a href="{{ route('abm-noticias.destroy',$news->id) }}" class="btn btn-danger">Eliminar</a></td>						
						</tr>						
						@endforeach
					</tbody>
				</table>
				{{$noticias->links()}}
			</div>			
		</div>		
	</div>

@endsection