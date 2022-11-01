   <!-- Listado de permisos para el departamento de consola, no necesitan iniciar sesión -->
<?php 
        $comunicado = 0;
        if(isset($_GET["comu"]))
        {
            $comunicado = $_GET["comu"];
        }
    ?>

<div class="container-fluid">
        <div class="row" style="position: relative;">
            <div class="encabezado" style="padding: 0px">
            <a href="?page=home">
                <img style="object-fit: cover;width:11.7%;height:65%;" src="Resources/images/logo.PNG" alt=""></a>
            </div>
        
            <div class="m-0 row justify-content-center align-items-center" style="position:absolute;">
                <div class="contenido2" >
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-body" style="padding:15px" id="permisoTodos">
                            
                        </div>
                    </div>
                </div>

        <div class="modal fade" id="solicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Datos Solicitud</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10">
                                                    <br>
                                                    <form class="form form-horizontal">
                                                        <div class="form-body"  >                                                                
                                                            <div class="row" id="permiso" >                                                                        
                                                                    
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    <script type="text/javascript" src="./Resources/js/permisosTodos.js"></script>
    <script type="text/javascript" src="./Resources/js/solModal.js"></script>