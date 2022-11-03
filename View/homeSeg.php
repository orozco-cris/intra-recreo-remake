<?php  
/*if(!isset($_SESSION["perfil"]) || $_SESSION["perfil"] == "ADM"
	|| $_SESSION["perfil"] == "SIS")
	header("Location: ?page=login");

if ($_SESSION["perfil"] == "VIS" || $_SESSION["perfil"] == "ADM")
	{ 
		echo '<div class="d-grid gap-1 d-md-flex justify-content-md-end">';		
		echo '<button class="btn btn-primary" id="btnAtras" type="button">';			
		echo '<span class="fa-solid fa-angles-left"></span>';				
		echo 'Atrás';				
		echo '</button>';				
		echo '</div>';		
	}else{
		echo '<div class="d-grid gap-1 d-md-flex justify-content-md-end">';	
		echo '<a href="?page=logout">';		
		echo '<button class="btn btn-danger" id="btnLogout" type="button">';			
		echo '<span class="fa-solid fa-right-from-bracket"></span>';				
		echo 'Cerrar sesión';				
		echo '</button>';			
		echo '</a>';		
		echo '</div>';	
	}*/
?>

<div class="container-fluid">
        <div class="row" style="position: relative;">
            <div class="encabezado" style="padding: 0px">
			<a href="?page=home">
                <img style="object-fit: cover;width:20%;height:100%;" src="Resources/images/logo.PNG" alt="">
			</a>	
            </div>
            <div class="inicio">
                <button type="button" class="form-control btn btn-danger btnCerrar" data-bs-toggle="modal"
                    data-bs-target="#iniciar" onclick="window.location.href='?page=logout'">Cerrar Sesión</button>
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
            						COMERCIAL
          						</font></font></a>
          						<ul class="dropdown-menu bg-primary" style="border: none !important; left:30%">
            						<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Empresas</font></font></a></li>
           
          						</ul>
        					</li>
           					<li class="nav-item dropdown" style="padding-left:30%">
              					<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                					PERMISOS
              					</font></font></a>
              					<ul class="dropdown-menu bg-primary" style="border: none !important; left:20%">
                					<li><a class="dropdown-item opcion" href="?page=permisos"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes no revisadas</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes aprobadas</font></font></a></li>       
              					</ul>
            				</li>
          				</ul>
        			</div>
      			</div>
    		</nav>
		</div>
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
                <img class="hidden-xs" style="width:100%; height:auto;" src="Resources/images/fondo.jpg" alt="">
            </div>
		</div>
    </div>
