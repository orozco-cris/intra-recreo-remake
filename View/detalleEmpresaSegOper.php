

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
        include 'homeSeg.php';
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


                </div>
            </div>         
        </div>

    
</div>
<div class="d0">
	<input type="hidden" id="id_empresa_especifica" value="<?php echo $empresa; ?>">
    <input type="hidden" id="id_mix_empresa" value="<?php echo $mix; ?>">  
</div>
<script type="text/javascript" src="./Resources/js/empresaEspecifica.js"></script>