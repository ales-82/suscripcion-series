<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
	 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('css/style.css')}}">	
</head>
<body class="d-flex flex-column min-vh-100 position-relative">

@yield('nav')
@yield('portada')
<main style="margin-bottom: 150px;">
	@yield('main')	
</main>

	<footer class="bg-dark text-white text-center pb-1 pt-3 position-absolute w-100 bottom-0">
			TV+MAS -  info@tvmas.com <br>
			<hr class="w-75 mx-auto text-white">	
			
			<i class="fa-brands fa-tiktok"></i> 
			<i class="fa-brands fa-twitter"></i> 
			<i class="fa-brands fa-instagram"></i> 
			<i class="fa-brands fa-facebook"></i> 
			<i class="fa-brands fa-skype"></i> 

	</footer>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
	
</body>
</html>