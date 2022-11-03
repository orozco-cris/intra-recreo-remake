<?php 
        $tipo = 0;

        if(isset($_GET["tipo"]))
        {
            $tipo = $_GET["tipo"];
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Denominación</label></strong>
                            </div>
                            <div class="col-md-4 form-group">
                                <input id="denominacion" class="form-control" type="text">
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Ubicación</label></strong>
                            </div>
                            <div class="col-md-4 form-group">
                                <input id="ubicacion" class="form-control" type="text">
                            </div>
                        </div>     
                        
                        <div class="row justify-content-center">
                            <div class="col-md-12" id="tblLocales">
                                        
                            
                            
                            </div>
                        </div>                    
                    </div>    
                </div>
            </div>         
        </div>
    </div>
    <div>
        <input type="hidden" id="tipo" value="<?php echo $tipo; ?>">
    </div>

</div>


<script type="text/javascript" src="./Resources/js/espacioFisico.js"></script>