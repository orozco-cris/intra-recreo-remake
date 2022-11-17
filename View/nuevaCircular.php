<!-- registro de una nueva circular-->
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
                                <strong><label>De</label></strong>
                            </div>
                            <div class="col-md-8 form-group">
                                <input id="de" class="form-control" type="text">
                            </div> 
                            <div class="col-md-1" style="padding:15px"></div>                           
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Para</label></strong>
                            </div>
                            <div class="col-md-8 form-group">
                                <select id="para" class="form-control">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Cliente</option>
                                    <option value="2">Empresa</option>
                                    <option value="3">Mix Comercial</option>
                                    <option value="4">Local</option>
                                    <option value="5">Isla</option>
                                    <option value="6">Publicidad</option>
                                </select>
                            </div> 
                            <div class="col-md-1" style="padding:15px"></div>                           
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Asunto</label></strong>
                            </div>
                            <div class="col-md-8 form-group">
                                <input id="asunto" class="form-control" type="text">
                            </div> 
                            <div class="col-md-1" style="padding:15px"></div>                           
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                            <strong><label>Mensaje</label></strong>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea id="mensaje" class="form-control" type="text" rows="3"></textarea>
                                <input id="tipo" class="form-control" type="hidden" value="circular">
                                <input id="fechacaducidad" class="form-control" type="hidden" value="2022/10/15">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-1" style="padding:15px"></div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Desripción</label></strong>
                            </div>
                            <div class="col-md-8 form-group" style="padding:15px">
                                <textarea type="text" class="fom-control" id="descripcion" name="descripcion" rows="8"></textarea> 
                            </div>
                        </div> 
                        
                        <div class="row" id="val">   
                            <div class="col-md-2" style="padding:15px"></div>
                            <div class="col-md-10 form-group" id="imagen">   
                            </div> 
                        </div>
                        <div class="row">     
                                 <div class="col-md-1" style="padding:15px"></div>                                          
                                <div class="col-md-10 form-group" style="padding:10px" >
                                    <input type="file" class="btn btn-primary" id="file" name="file" accept="image/gif, image/jpeg, image/png">
                                </div>                                                        
                                                                               
                        </div>

                        <div class="row">
                            <div class="col-md-9 form-group"></div>
                            <div class="col-md-1 form-group" style="padding-top:5%">
                               <input type="button" class="btn btn-danger"  value="Cancelar" id="cancelarCircular">
                            </div>
                            <div class="col-md-1 form-group"  style="padding-top:5%">
                                <input class="btn btn-primary"  type="submit" id="registrarCircular"  name="registrarcircular" value="Guardar">
                            </div>
                        </div>
                                            
                    </div>    
                </div>
            </div>         
        </div>

            <!--   modal para clientes -->
                <div class="modal fade" id="clientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Seleccionar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                   <div id="clienteCircular">

                                                   </div>
                                                    <div class="row">
                                                        <div class="col-md-10 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="selectClientes"  name="selectClientes" value="Crear">
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

                    <!--   modal para empresas -->
                <div class="modal fade" id="empresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Seleccionar Empresa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                   <div id="empresaCircular">

                                                   </div>
                                                    <div class="row">
                                                        <div class="col-md-10 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="selectEmpresas"  name="selectEmpresas" value="Crear">
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

                            <!--   modal para espacio fisico -->
                <div class="modal fade" id="espacioFisico" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Seleccionar espacio físico</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                   <div id="espacioFisicoCircular">

                                                   </div>
                                                    <div class="row">
                                                        <div class="col-md-10 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="selectEspacios"  name="selectEspacios" value="Crear">
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

                      <!--   modal para mix Comercial -->
                      <div class="modal fade" id="mixComercial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Seleccionar mix Comercial</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                   <div id="mixComercialCircular">

                                                   </div>
                                                    <div class="row">
                                                        <div class="col-md-10 form-group"></div>
                                                        <div class="col-md-1 form-group" style="padding-top:5%">
                                                            <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                                        </div>
                                                        <div class="col-md-1 form-group"  style="padding-top:5%">
                                                            <input class="btn btn-primary"  type="submit" id="selectMixes"  name="selectMixes" value="Crear">
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

<style>
.ck-editor__editable_inline {
    min-height: 150px;
}
</style>

<script type="text/javascript" src="./Resources/js/circulares.js"></script>
<script type="text/javascript" src="./Resources/js/usuarios.js"></script>
<script type="text/javascript" src="./Resources/js/empresas.js"></script>