<!-- Visualizar el detalle del arriendo -->


<?php 
        $arriendo = 0;
        if(isset($_GET["arriendo"]))
        {
            $arriendo = $_GET["arriendo"];
        }
    ?>
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
                    <div class="col-md-12" id="detalleArriendo">
                                 
                    
                    
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 form-group"></div>
                            <div class="col-md-1 form-group" style="padding-top:3%">
                                <input type="button" class="btn btn-danger"  id="eliminar_arriendo" value="Eliminar">
                            </div>
                            <div class="col-md-1 form-group"  style="padding-top:3%">
                                <input class="btn btn-primary"  id="editar_arriendo" type="submit" data-bs-toggle="modal"  data-bs-target="#editarArriendo" value="Editar">
                            </div>
                        </div>
                    </div>

                </div>
            </div>         
        </div>


    <div class="modal fade" id="editarArriendo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1"
                    aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Arriendo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="card-body">
                        <div class="row justify-content-center" >
                            <div id="arriendoEditar">
                                                              
                            </div>
                            <div class="row">
                                <div class="col-md-9 form-group"></div>
                                    <div class="col-md-1 form-group" style="padding-top:5%">
                                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                    </div>
                                <div class="col-md-1 form-group"  style="padding-top:5%">
                                        <input class="btn btn-primary"  type="submit" id="modificarArriendo"  name="modificar" value="Modificar">
                                </div>
                            </div>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
<div class="d0">
	<input type="hidden" id="id_arriendo_especifico" value="<?php echo $arriendo; ?>">
</div>
<script type="text/javascript" src="./Resources/js/arriendos.js"></script>
