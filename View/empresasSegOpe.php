<!-- listado de todas las empresas registradas con estado 1-->

<div class="container-fluid">
    <?php 
        include 'homeSeg.php';
    ?>
	<div class="row  justify-content-center" style="position: relative;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
            <img class="hidden-xs" style="width:100%; height: auto" src="Resources/images/fondo.jpg" alt="">
        </div>
            
        <div class="contenido border border-primary"><br>
        <div class="row">
                                                    <div class="col-md-2 form-group"></div>
                                                    <div class="col-md-8 form-group">
                                                        <input class="form-control" type="text" placeholder="Buscar" id="buscarEmpresa">                                                                             
                                                    </div>  
                                                </div>    <br >
            <div class="card-body" style="padding:15px" id="tblEmpresasSegOpe">
                   
            </div>
        </div>

                
                

    </div>
</div>
    <script type="text/javascript" src="./Resources/js/empresas.js"></script>
    <script type="text/javascript" src="./Resources/js/usuarios.js"></script>

    