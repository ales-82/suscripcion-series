
let sesion = document.getElementById('login');
let cerrar = document.getElementById('cerrar');

if(sessionStorage.getItem('usuario')){
	sesion.style.display = 'none';
	cerrar.style.display = 'block';	
}else{
	cerrar.style.display = 'none';
	sesion.style.display = 'block'	
}	


//cerrar sesion
function cerrarSesion(){
	/*fetch('http://localhost:8000/api/logout',{
	headers:{
		"Content-Type":"application/json",
		"Authorization":"Bearer " + sessionStorage.getItem('accessToken')
	}	
	}).then(function(res){*/
		
		sessionStorage.clear();
		window.location.href="login.html"
	//})	
}

