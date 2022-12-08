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
    <?php 
        include 'menuHomeCliente.php';
    ?>
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
                                                <button type="button" class="btn login_btn btn-warning me-3 d-none" data-bs-toggle="modal"  data-bs-target="#retroalimentacion" id="id_comentar"  name="id_comentar" value="">COMENTAR</button>
                                                <input class="btn float-right login_btn btn-primary d-none" type="submit" id="id_aceptar"  name="id_aceptar" value="ACEPTAR">
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 8px !important">  
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input class="btn float-right login_btn btn-primary d-none"  id="id_modificar"   data-bs-toggle="modal"  data-bs-target="#modificarPermiso" value="MODIFICAR">
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
   

    <div class="modal fade" id="retroalimentacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1"
                    aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Comentario de retroalimentación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="card-body">
                        <div class="row justify-content-center" >
                            <div id="id_retroalimentacion_permiso" class="form-floating">
                                <textarea class="form-control" placeholder="Mensaje de retroalimentación" id="id_input_retroalimentacion" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Mensaje de retroalimentación</label>
                            </div>
                            <div class="row">
                                <div class="col-md-9 form-group"></div>
                                    <div class="col-md-1 form-group" style="padding-top:5%">
                                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                    </div>
                                    <div class="col-md-1 form-group"  style="padding-top:5%">
                                    <button type="button" class="btn btn-primary"  type="submit" id="id_retro_permiso"  name="retro_permiso">Modificar</button>
                                    </div>
                        </div>
                     </div>
                </div>                                
            </div>
        </div>
    </div>



    

    </div> 

    <div class="modal fade" id="modificarPermiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle4"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modificar Solicitud</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <form class="form form-horizontal" >
                                        <div class="form-body" id="permisoAModificar">
                                        <div class="row" style="position: relative;" id="modificarPermiso">
                                                <div class="col-md-6">
                                                    <div class="row" style="padding:5px">
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> DE:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="de" class="form-control" type="text" >
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> ASUNTO:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="asunto" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> PARA:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <input id="para" class="form-control" type="text" >
                                                        </div>
                                                        <input id="codigo" class="form-control" type="hidden" >
                                                       <!--  <div class="col-md-4" style="padding:15px">
                                                            <label> MENSAJE:</label>
                                                        </div> -->
                                                        <div class="col-md-8 form-group">
                                                            <input id="mensaje" class="form-control" type="hidden" rows="3">
                                                            <input id="tipo" class="form-control" type="hidden" value="permiso">
                                                            <input id="fechacaducidad" class="form-control" type="hidden" value="2022/10/15">
                                                        </div>
                                                        <div class="row">
                                                <div class="col-md-4" style="padding:10px">
                                                    <label> DESCRIPCION:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea class="fom-control" name="txtDescripcion" id="txtDescripcion" rows="8"></textarea> 
                                                </div>
                                                <input type="hidden" id="id_comunicado">
                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" id="val">   
                                                    <div class="col-md-10 form-group" id="imagen">
                                                    <img style="width:80%; heigth:50px">  
                                                    </div>                                                     
                                                        <div class="col-md-10 form-group" style="padding:10px" >
                                                            <input type="file" class="btn btn-primary" id="file" name="file" accept="image/gif, image/jpeg, image/png">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-md-9"></div>
                                           <div class="col-md-1 form-group"style="padding-top:2%">
                                                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal" id="id_cancelar" value="Cancelar">
                                            </div>
                                            <div class="col-md-1 form-group"  style="padding-top:2%">
                                                        <input class="btn btn-primary"  type="submit" id="id_modificarPermiso"  name="id_modificarPermiso" value="Modificar">
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


<div class="d0">
	<input type="hidden" id="id_comunicado_especifico" value="<?php echo $comunicado; ?>">
    <input type="hidden" id="id_estado_comunicado" value="<?php echo $estado; ?>">
    <input type="hidden" id="id_revision_comunicado" value="<?php echo $revision; ?>">
</div>


<style>
.ck-editor__editable_inline {
    min-height: 150px;
}
</style>
    <script type="text/javascript" src="./Resources/js/solEspecificas.js"></script>