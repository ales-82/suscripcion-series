		@if(session('fallo'))
        	<p class="alert alert-danger text-center fw-bolder">{{session('fallo')}}</p>
    	@endif 
		<nav class="navbar navbar-expand-lg shadow navbar-dark bg-dark">
		  <div class="container">
		  	<h1 class="h6">
		  		<a class="navbar-brand" href="/">
		  			<!--<img src="images/Logo.png" alt="" width="120">-->
		  			TV+MAS
		  		</a>
		  	</h1>		  	
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>		    
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">		    	
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">		      	
		        <li class="nav-item">
		          <a class="nav-link text-white" href="/">HOME</a>
		        </li>		        
		        <li class="nav-item">
		          <a class="nav-link text-white" href="/#suscripciones">SERVICIOS</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-white" href="{{ route('noticias') }}">NOTICIAS</a>
		        </li>
		        @auth()		         
		         	@if(Auth::user()->rol_id == 1)
		         	<li class="nav-item">
			          <a class="nav-link text-white" href="{{ route('admin.dashboard.index') }}">ESTADISTICAS</a>
			        </li>
					<li class="nav-item">
			          <a class="nav-link text-white" href="{{ route('abmnoticias') }}">ABM-Noticias</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-white" href="{{ route('usuarios') }}">ABM-Usuarios</a>
			         </li>
			         <li class="nav-item">
			          <a class="nav-link text-white btn btn-danger " href="{{ route('logout') }}">Cerrar Sesión</a>
			        </li>
		        	@else
		        	<li class="nav-item">
		        		<a href="{{ route('info', Auth::user()->id) }}" class="nav-link text-white">SUSCRIPCIONES</a>
		        	</li>
		        	<li class="nav-item dropdown">
		          		<a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->usuario}}
		          		</a>
		          		<ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
		          			<li>
		          				<a href="/perfil/{{ Auth::user()->id }}" class="nav-link">Ir a perfil</a>
		          			</li>
		          			<li>
		          				<a href="{{ route('logout') }}" class="nav-link">Cerrar Sesion</a>
		          			</li>
		          		</ul>
		        	</li>		        	
		        	@endif		            
		    	@else		                
		        <li class="nav-item login-m">		    		
		          <a class="nav-link text-white" href="{{ route('login') }}">
		            <i class="fa-sharp fa-solid fa-user"></i> LOGIN
		          </a>		          
		        </li>
		        @endauth		       
		      </ul>		     
		    </div>
		  </div>
		</nav>

		    	           
		        