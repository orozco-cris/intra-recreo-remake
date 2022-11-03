<!-- registro de arriendos -->
<div class="container-fluid">
    <?php 
        include 'menuHomeAdmin.php';
    ?>
	<div class="row  justify-content-center" style="position: relative;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
            <img class="hidden-xs" style="width:100%; height: auto" src="Resources/images/fondo.jpg" alt="">
        </div>
            
        <div class="contenido border border-primary">
            <div class="card-body" style="padding:15px" >
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Empresa</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                            <input type="text" class="form-control" id="nombreEmpresa"  data-bs-toggle="modal"  data-bs-target="#empresa">
                            <input class="form control" id="idEmpresa" type="hidden" >
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Denominación</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input class="form-control" type="text" id="nombreDenominacion" data-bs-toggle="modal"  data-bs-target="#denominacion">
                                <input class="form control" id="idDenominacion" type="hidden">
                            </div>
                            <div class="col-md-1" style="padding:15px"></div>
                        </div>     
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Vendedor Arriendo</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input id="vendedor" class="form-control" type="text">
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Tipo Contrato</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input id="tipoContrato" class="form-control" type="text">
                            </div>
                            <div class="col-md-1" style="padding:15px"></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Costo Contrato</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input id="costo" class="form-control" type="text">
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Descuento</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input id="descuento" class="form-control" type="text">
                            </div>
                            <div class="col-md-1" style="padding:15px"></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Fecha registro</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input id="fecharegistro" class="form-control" type="text">
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label>Fecha vencimiento</label></strong>
                            </div>
                            <div class="col-md-3 form-group">
                                <input id="fechavencimiento" class="form-control" type="text">
                            </div>
                            <div class="col-md-1" style="padding:15px"></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Observación</label></strong>
                            </div>
                            <div class="col-md-8 form-group">
                                <input id="observacion" class="form-control" type="text">
                            </div>
                            
                            <div class="col-md-1" style="padding:15px"></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-9 form-group"></div>
                            <div class="col-md-1 form-group" style="padding-top:5%">
                               <input type="button" class="btn btn-danger"  value="Cancelar" id="cancelarArriendo">
                            </div>
                            <div class="col-md-1 form-group"  style="padding-top:5%">
                                <input class="btn btn-primary"  type="submit" id="registrarArriendo"  name="registrarArriendo" value="Guardar">
                            </div>
                        </div>
                                            
                    </div>    
                </div>
            </div>         
        </div>

        <!--     modal empresa -->
        <div class="modal fade" id="empresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Seleccionar empresa</h5>
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
                                                <div class="col-md-2 form-group"></div>
                                                <div class="col-md-8 form-group">
                                                    <input class="form-control" type="text" placeholder="Buscar" id="buscarempresa">                                                                             
                                                </div>  
                                            </div>    <br>                                            
                                            <div class="row">
                                                <div id="listEmpresas">

                                                </div>                                                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 form-group"></div>
                                                <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                </div>
                                                <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="id_aceptarE"  value="Aceptar">
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

<!--     modal denominacion -->
<div class="modal fade" id="denominacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Seleccionar Denominación</h5>
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
                                                <div class="col-md-2 form-group"></div>
                                                <div class="col-md-8 form-group">
                                                    <input class="form-control" type="text" placeholder="Buscar" id="buscardenominacion">                                                                             
                                                </div>  
                                            </div>    <br>                                                   
                                            <div class="row">
                                                <div id="listDenominacion">

                                                </div>                                                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 form-group"></div>
                                                <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                </div>
                                                <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="id_aceptarD"  name="id_aceptarD" value="Aceptar">
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

<script type="text/javascript" src="./Resources/js/arriendos.js"></script>
<script type="text/javascript" src="./Resources/js/empresas.js"></script>
<script type="text/javascript" src="./Resources/js/espacioFisico.js"></script>
<script type="text/javascript" src="./Resources/js/filtrarBusqueda.js"></script>