
    <div class="container-fluid">
        <div class="row" style="position: relative;">
            <div class="encabezado" style="padding: 0px">
                <img style="object-fit: cover;width:20%;height:100%;" src="Resources/images/logo.PNG" alt="">
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
          					<li class="nav-item dropdown" style="padding-left:30%">
          						<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            						COMERCIAL
          						</font></font></a>
          						<ul class="dropdown-menu bg-primary" style="border: none !important; left:50%">
            						<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">	Mix Comercial</font></font></a></li>
									<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">	Empresas</font></font></a></li>
          						</ul>
        					</li>
           					<li class="nav-item dropdown" style="padding-left:30%">
              					<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                					CIRCULARES
              					</font></font></a>
              					<ul class="dropdown-menu bg-primary" style="border: none !important; left:40%">
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Añadir usuario interno</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Circulares no reviados</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear circulares</font></font></a></li>       
              					</ul>
            				</li>
                            <li class="nav-item dropdown" style="padding-left:30%">
              					<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                					ADMINISTRACIÓN
              					</font></font></a>
              					<ul class="dropdown-menu bg-primary" style="border: none !important; left:42%">
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuarios</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Locales</font></font></a></li>
									<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Islas</font></font></a></li>
									<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicidades</font></font></a></li>
									<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etapas</font></font></a></li>
									<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Arriendos</font></font></a></li>
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
                <div class="col-lg-12 col-md-12">
                    <div class="card-body" style="padding:15px" id="tblMixComercial">
                       
                           
                    </div>
                </div>
            </div>

                    <!-- Modal -->
                <div class="modal fade" id="solicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Crear Mix Comercial</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal" id="uploadForm">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-1" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Nombre</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="nombre" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-1" style="padding:15px"></div>
                                                        <div class="col-md-1" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px"> 
                                                            <label> Descripción</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <textarea id="descripcion" class="form-control" type="text" rows="6"></textarea>
                                                        </div>   
                                                        <div class="col-md-1" style="padding:15px"></div>                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="id_aceptar"  name="id_aceptar" value="Crear">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </di>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript" src="./Resources/js/mixComercial.js"></script>