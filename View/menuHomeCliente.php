   <!-- menu para el cliente -->

    <div class="row" style="position: relative;">
        <div class="encabezado" style="padding: 0px">
        <a href="?page=home">
            <img style="object-fit: cover;width:20%;height:100%;" src="Resources/images/logo.PNG" alt=""></a>
        </div>
        <div class="inicio">
                <button type="button" class="form-control btn btn-danger btnCerrar" onclick="window.location.href='?page=logout'">Cerrar Sesión</button>
        </div>
    </div>
	<div class="row ">
		<nav class="navbar navbar-expand-lg bg-primary">
      		<div class="container-fluid">
        		<a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></a>
       			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Navegación de palanca">
          			<span class="navbar-toggler-icon"></span>
        		</button>
       			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
          					<li class="nav-item dropdown" style="padding-left:30%">
          						<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            						CIRCULARES
          						</font></font></a>
          						<ul class="dropdown-menu bg-primary" style="border: none !important; left:15%">
            						<li><a class="dropdown-item opcion" href="?page=circularesClientes"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Circulares</font></font></a></li>
                                    <li><a class="dropdown-item opcion" href="?page=circularesNoRevisadasClientes"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Circulares no revisadas</font></font></a></li>    
          						</ul>
        					</li>
           					<li class="nav-item dropdown" style="padding-left:30%">
              					<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                					PERMISOS
              					</font></font></a>
              					<ul class="dropdown-menu bg-primary" style="border: none !important ; left:15%">
                					<li><a class="dropdown-item opcion" href="?page=permisosAprobados"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes aprobada</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="?page=permisosNoAprobados"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes no revisadas</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="?page=menuCliente"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear solicitud</font></font></a></li>       
              					</ul>
            				</li>
          				</ul>
        			</div>
      		</div>
    	</nav>
	</div>