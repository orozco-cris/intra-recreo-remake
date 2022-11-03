<!-- Visualizar el detalle de cada empresa -->


<?php 
        $empresa = 0;
        $mix=0;
        if(isset($_GET["empresa"]))
        {
            $empresa = $_GET["empresa"];
            $mix = $_GET["mix"];
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
                    <div class="col-md-12" id="empresaId">
                                 
                    
                    
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 form-group"></div>
                            <div class="col-md-1 form-group" style="padding-top:3%">
                                <input type="button" class="btn btn-danger"  id="eliminar_empresa" value="Eliminar">
                            </div>
                            <div class="col-md-1 form-group"  style="padding-top:3%">
                                <input class="btn btn-primary"  id="editar_empresa" type="submit" data-bs-toggle="modal"  data-bs-target="#editarEmpresa" value="Editar">
                            </div>
                        </div>
                    </div>

                </div>
            </div>         
        </div>


    <div class="modal fade" id="editarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1"
                    aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="card-body">
                        <div class="row justify-content-center" >
                            <div id="empresaEditar">
                                                              
                            </div>
                            <div class="row">
                                <div class="col-md-9 form-group"></div>
                                    <div class="col-md-1 form-group" style="padding-top:5%">
                                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                    </div>
                                <div class="col-md-1 form-group"  style="padding-top:5%">
                                        <input class="btn btn-primary"  type="submit" id="modificarEmpresa"  name="modificar" value="Modificar">
                                </div>
                            </div>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
<div class="d0">
	<input type="hidden" id="id_empresa_especifica" value="<?php echo $empresa; ?>">
    <input type="hidden" id="id_mix_empresa" value="<?php echo $mix; ?>">  
</div>
<script type="text/javascript" src="./Resources/js/empresaEspecifica.js"></script>
<!-- <script type="text/javascript" src="./Resources/js/modEmpresa.js"></script> -->
