<nav class="navbar navbar-expand-sm navbar-dark bg-info mb-4">
  <a class="navbar-brand" href="home.php">
	<img class="rounded" src="dist/img/can-analytic.jpeg" width="32" height="32" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
	<ul class="navbar-nav mr-auto">

	  <!-- HOME -->
	  <li class="nav-item <?php if($active=="home") echo "active";?>">
		<a class="nav-link" href="home.php">Home</a>
	  </li>
	  
	  <!-- UBICA -->
	  <li class="nav-item <?php if($active=="ubica") echo "active";?>">
		<a class="nav-link" href="ubica.php">Ubicación</a>
	  </li>

	  <!-- PERFIL -->
	  <li class="nav-item <?php if($active=="perfil") echo "active";?>">
		<a class="nav-link" href="perfil.php">Perfil</a>
	  </li>

	</ul>
	  <a class="btn btn-sm btn-outline-light my-2 my-sm-0 bg-info fa fa-sign-out text-light" title="Salir" href="connection/desconectar_usuario.php"></a>
  </div>
</nav>