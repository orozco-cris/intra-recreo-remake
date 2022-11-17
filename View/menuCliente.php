   <!-- Listado de permisos para el los clientes -->
<div class="container-fluid">
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
            						<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Circulares</font></font></a></li>
                                    <li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Circulares no revisadas</font></font></a></li>    
          						</ul>
        					</li>
           					<li class="nav-item dropdown" style="padding-left:30%">
              					<a class="nav-link dropdown-toggle opcion" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                					PERMISOS
              					</font></font></a>
              					<ul class="dropdown-menu bg-primary" style="border: none !important ; left:15%">
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes aprobada</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes no revisadas</font></font></a></li>
                					<li><a class="dropdown-item opcion" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear solicitud</font></font></a></li>       
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
        <div class="contenido1 border border-primary">
            <div class="col-lg-12 col-md-12">
                <div class="card-body" style="padding:15px">
                    <div class="row">
                       <button type="button" class="form-control btn btn-success solicitud" data-bs-toggle="modal"  data-bs-target="#nuevo">Nueva Solicitud</button>
                    </div>
                    <div id="tblAuditadasRep">
                        <div class="row text-center">
                            <div class="col-sm-3">ASUNTO</div>   
                            <div class="col-sm-3">FECHA</div> 
                            <div class="col-sm-3">DEPARTAMENTO</div> 
                            <div class="col-sm-3"></div>                             
                        </div>
                        <div class="row  justify-content-center" style="padding:5px">
                            <div class="col-sm-12 border border-dark text-center fila">
                                <label for=""></label>
                            </div>
                        </div>
                        <div class="row  justify-content-center" style="padding:5px">
                            <div class="col-sm-12 border border-dark text-center fila">
                                <label for=""></label>
                            </div>
                        </div>
                        <div class="row  justify-content-center" style="padding:5px">
                            <div class="col-sm-12 border border-dark text-center fila">
                                <label for=""></label>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>            
        </div>


   



	</div>
    <div class="row">
             <!-- Modal ingreso-->
        <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Crear Solicitud</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <form class="form form-horizontal" id="uploadForm">
                                        <div class="form-body">
                                            <div class="row" style="position: relative;" >
                                                <div class="col-md-6">
                                                    <div class="row" style="padding:5px">
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> DE:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="de" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px"> 
                                                            <label> PARA:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="para" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> ASUNTO:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="asunto" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> DESTINATARIO:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group" id="usuarios">
                                                           
                                                        </div>
                                                       <!--  <div class="col-md-4" style="padding:15px">
                                                            <label> MENSAJE:</label>
                                                        </div> -->
                                                        <div class="col-md-8 form-group">
                                                            <input id="mensaje" class="form-control" type="hidden" rows="3">
                                                            <input id="tipo" class="form-control" type="hidden" value="permiso">
                                                            <input id="fechacaducidad" class="form-control" type="hidden" value="2022/10/15">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" id="val">   
                                                    <div class="col-md-10 form-group" id="imagen"></div>                                                     
                                                        <div class="col-md-10 form-group" style="padding:10px" >
                                                            <input type="file" class="btn btn-primary" id="file" name="file" accept="image/gif, image/jpeg, image/png">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2" style="padding:10px">
                                                    <label> DESCRIPCION:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" class="fom-control" id="descripcion" name="descripcion" id="txtDescripcion" rows="8"></textarea> 
                                                </div>
                                                    <div class="col-md-1 form-group"style="padding-top:13%">
                                                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal" id="id_cancelar" value="Cancelar">
                                                </div>
                                                <div class="col-md-1 form-group"  style="padding-top:13%">
                                                        <input class="btn btn-primary"  type="submit" id="id_crearSol"  name="id_crearSol" value="Crear">
                                                </div>        
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

        <div class="modal fade" id="solicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Datos Solicitud</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10">
                                                    <br>
                                                    <form class="form form-horizontal">
                                                        <div class="form-body"  >                                                                
                                                            <div class="row" id="permiso" >                                                                        
                                                                    
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
                    </div>
                </div>
            </div>
        </div>
        

</div>



<style>
.ck-editor__editable_inline {
    min-height: 150px;
}
</style>

<script type="text/javascript" src="./Resources/js/permisosClientes.js"></script>
<script type="text/javascript" src="./Resources/js/usuarios.js"></script>
<script type="text/javascript" src="./Resources/js/solModal.js"></script>