<!-- listado de todas las empresas registradas con estado 1-->

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
				<button type="button" class="form-control btn btn-success solicitud"  data-bs-toggle="modal"  data-bs-target="#empresa">Nueva Empresa</button>
                </div>                           
            </div>
            <div class="card-body" style="padding:15px" id="tblEmpresas">
                   
            </div>
        </div>
		                    <!-- Modal Registro-->
				<div class="modal fade" id="empresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Registrar empresa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal" id="mixComercial">
                                                <div class="form-body">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Nombre Comercial</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input id="nombre" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-2" style="padding:15px"> 
                                                            <label> Mix Comercial</label>
                                                        </div>
                                                        <div class="col-md-4 form-group" id="mix">
                                                           
                                                        </div>                                                                                                 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> RUC Empresa</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input id="ruc" class="form-control" type="number">
                                                        </div>
                                                        <div class="col-md-2" style="padding:15px"> 
                                                            <label> Teléfono Empresa</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input id="telefono" class="form-control" type="number">
                                                        </div>                                                                                             
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px">
                                                            <label> Dirección</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input id="direccion" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-2" style="padding:15px"> 
                                                            <label> Correo</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input id="correo" class="form-control" type="email">
                                                        </div>                                                                                                
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"> 
                                                            <label> Usuario</label>
                                                        </div>
                                                        <div class="col-md-4 form-group" id="usuarioE">   
                                                           
                                                        </div>   
                                                        <div class="col-md-6" style="padding:15px"></div>                                                                                                                                                     
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="id_guardar"  name="id_guardar" value="Crear">
                                                        </div>
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
</div>
    <script type="text/javascript" src="./Resources/js/empresas.js"></script>
    <script type="text/javascript" src="./Resources/js/usuarios.js"></script>