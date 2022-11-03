<!-- Visualizar el detalle de cada empresa -->


<?php 
        $espacio = 0;
        if(isset($_GET["espacio"]))
        {
            $espacio = $_GET["espacio"];
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
                    <div class="col-md-12" id="espacioFisicoId">
                                 
                    
                    
                    </div>
                    <div class="col-md-12"><!-- 
                        <div class="row">
                            <div class="col-md-9 form-group"></div>
                            <div class="col-md-1 form-group" style="padding-top:3%">
                                <input type="button" class="btn btn-danger"  id="eliminar_empresa" value="Eliminar">
                            </div>
                            <div class="col-md-1 form-group"  style="padding-top:3%">
                                <input type="button" class="btn btn-primary"  id="editar"  value="Editar">
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>         
        </div>

<div class="d0">
	<input type="hidden" id="id_espacio_fisico" value="<?php echo $espacio; ?>">
</div>
<script type="text/javascript" src="./Resources/js/detalleEspacioFisico.js"></script>
