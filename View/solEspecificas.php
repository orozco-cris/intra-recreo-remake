<!--     presentar el detalle de una determinada solicitud -->
    
    <?php 
        $comunicado = 0;
        $estado = 0;
        if(isset($_GET["comu"]))
        {
            $comunicado = $_GET["comu"];
            $estado = $_GET["estado"];
            $revision= $_GET["revision"];
        }
    ?>

    <div class="container-fluid">
        <div class="row" style="position: relative;">
            <div class="encabezado" style="padding: 0px">
            <a href="?page=home">
                <img style="object-fit: cover;width:25%;height:100%;" src="Resources/images/logo.PNG" alt=""></a>
            </div>
            <div class="inicio">
                <button type="button" class="form-control btn btn-danger btnCerrar" data-bs-toggle="modal"
                    data-bs-target="#iniciar">Cerrar Sesión</button>
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
          					<li class="nav-item dropdown"  style="padding-left:30%">
          						<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            						COMERCIAL
          						</font></font></a>
          						<ul class="dropdown-menu  bg-primary" style="border: none !important ; left:30%">
            						<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clientes</font></font></a></li>
           
          						</ul>
        					</li>
           					<li class="nav-item dropdown"  style="padding-left:30%">
              					<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                					PERMISOS
              					</font></font></a>
              					<ul class="dropdown-menu  bg-primary" style="border: none !important ; left:20%">
                                  <li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes no aprobadas</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes aprobadas</font></font></a></li>       
              					</ul>
            				</li>
          				</ul>
        			</div>
      			</div>
    		</nav>
		</div>
		<div class="row  justify-content-center" style="position: relative;">
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
                <img class="hidden-xs" style="width:100%; height: auto" src="Resources/images/fondo.jpg" alt="">
            </div>
            <div class="contenido border border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <br>
                                <form class="form form-horizontal">
                                    <div class="form-body"  >
                                        <div class="row" id="permisoDeterminado" >    
                                            
                                            
                                        </div>
                                        <div class="row" style="padding: 8px !important">  
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input class="btn float-right login_btn btn-primary d-none" type="submit" id="id_aceptar"  name="id_aceptar" value="ACEPTAR">
                                                </div>
                                        </div>
                                        <div class="row" style="padding: 8px !important">  
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input class="btn float-right login_btn btn-primary d-none" type="submit" id="id_modificar"  name="id_modificar" value="MODIFICAR">
                                                </div>
                                        </div>
                                    </div>
                                </form><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
<div class="d0">
	<input type="hidden" id="id_comunicado_especifico" value="<?php echo $comunicado; ?>">
    <input type="hidden" id="id_estado_comunicado" value="<?php echo $estado; ?>">
    <input type="hidden" id="id_revision_comunicado" value="<?php echo $revision; ?>">
</div>

    <script type="text/javascript" src="./Resources/js/solEspecificas.js"></script>