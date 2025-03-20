@section('title','usuarios')
@extends('admin.dashboard.template')
@section('nav')
	@include('includes.nav')
@endsection
@section('content')
	<div class="mb-5">
		<div class="container">
			<h2 class="h2 text-center pt-2 border-bottom">
			USUARIOS
			</h2>
			<div id="message"></div>			
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr class="table-dark">
							<th scope="col">NOMBRE</th>
							<th scope="col">EMAIL</th>							
							<th scope="col">PERFIL</th>
							<th colspan="2">ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						@foreach($usuario_json as $u)
						<tr>
							<td>
								{{$u->usuario}}
							</td>
							<td>{{ $u->email }}</td>
							<td>
								{{$u->perfil}}
							</td>							
							<td><a href="{{ route('ver-usuarios',$u->id)}}" class="btn btn-primary">Ver</a></td>
						</tr>						
						@endforeach
					</tbody>
				</table>				
			</div>			
		</div>		
	</div>

@endsection