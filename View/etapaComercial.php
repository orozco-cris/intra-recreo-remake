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
				    <button type="button" class="form-control btn btn-success solicitud"  data-bs-toggle="modal"  data-bs-target="#etapa">Nueva Etapa</button>
                </div>                           
            </div>
            <div class="card-body" style="padding:15px" >
                <div class="row justify-content-center">
                    <div class="col-md-12" id="etapaComercial">
                                 
                    
                    
                    </div>

                </div>
                
            </div>  
            
        </div>
        
                      <!-- Modal Registro-->
				<div class="modal fade" id="etapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Crear etapa comercial</h5>
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
                                                            <textarea id="descripcion" class="form-control" type="text" rows="6" ></textarea>
                                                        </div>   
                                                        <div class="col-md-1" style="padding:15px"></div>                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="id_crear"  name="" value="Crear">
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
          <!-- Modal Modificar-->
          <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1"
                    aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modificar Mix Comercial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div class="card-body">
                                <div class="row justify-content-center" >
                                    <div id="editarEtapaComercial">
                                            
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 form-group"></div>
                                            <div class="col-md-1 form-group" style="padding-top:5%">
                                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                            </div>
                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                            <input class="btn btn-primary"  type="submit" id="modificar"  name="modificar" value="Modificar">
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


<script type="text/javascript" src="./Resources/js/etapaComercial.js"></script>