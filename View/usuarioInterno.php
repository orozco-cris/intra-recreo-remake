<!-- listado de usuarios tipo clientes-->

<div class="container-fluid">
<?php 
        include 'menuHomeAdmin.php';
    ?>
	<div class="row  justify-content-center" style="position: relative;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
            <img class="hidden-xs" style="width:100%; height: auto" src="Resources/images/fondo.jpg" alt="">
        </div>
            
        <div class="contenido border border-primary">
            <div class="col-lg-12 col-md-12">
                <div class="row" style="padding:10px">
				<button type="button" class="form-control btn btn-success solicitud"  data-bs-toggle="modal"  data-bs-target="#ingresoUsuario">Nuevo Usuario</button>
                </div>                           
            </div>
            <div class="card-body" style="padding:15px" id="tblUsuarioInterno">
                   
            </div>
        </div>  
    </div>
               <!-- Modal Registro-->
				<div class="modal fade" id="ingresoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Registrar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Nombres</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="nombres" class="form-control" type="text">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                            
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Apellidos</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="apellidos" class="form-control" type="text">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px">   </div>                                                                                     
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Cédula</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="cedula" class="form-control" type="number">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                               
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Correo</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="correo" class="form-control" type="email">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Dirección</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="direccion" class="form-control" type="text">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Nombre de usuario</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="usuario_login" class="form-control" type="text">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Contraseña</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input id="clave" class="form-control" type="text">
                                                            <input id="tipo_Usuario" class="form-control" type="hidden" value="2">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="id_aceptar"  name="id_aceptar" value="Crear">
                                                        </div>
                                                        <div class="col-md-2" style="padding:15px">   
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

<script type="text/javascript" src="./Resources/js/usuarios.js"></script>