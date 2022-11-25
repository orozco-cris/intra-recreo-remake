<!--     presentar el detalle de una determinada solicitud -->
    
<?php 
        $circular = 0;
        if(isset($_GET["circular"]))
        {
            $circular = $_GET["circular"];
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
                <div class="card-content">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <br>
                                <form class="form form-horizontal">
                                    <div class="form-body"  >
                                        <div class="row" id="usuariosCirculares" >    
                                            
                                            
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


<div class="d0">
	<input type="hidden" id="id_circular_especifica" value="<?php echo $circular; ?>">
</div>
    <script type="text/javascript" src="./Resources/js/circularEspecifica.js"></script>