<!-- listado de todas las circulares -->
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
                <a href="?page=nuevaCircular">
				    <button type="button" class="form-control btn btn-success solicitud" >Nuevo</button>
                </a>
                </div>                           
            </div>
            <div class="card-body" style="padding:15px" >
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">
                         
                            </div>
                        </div>     
                        
                        <div class="row justify-content-center">
                            <div class="col-md-12" id="tblCirculares">
                                        
                            
                            
                            </div>
                        </div>                    
                    </div>    
                </div>
            </div>         
        </div>


    </div>
   
</div>

<script type="text/javascript" src="./Resources/js/circulares.js"></script>