    <div class="container-fluid" style="padding-top:4%">
        <div class="row" style="position: relative;">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
                <img class="hidden-xs" style="width:100%; height:auto;" src="./Resources/images/inicio.PNG" alt="">
            </div>
            <div class="inicio">
                <button type="button" class="form-control btn btn-warning btnInicio" data-bs-toggle="modal"
                    data-bs-target="#iniciar">Iniciar Sesión</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="iniciar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form class="login-container">
                                <div class="row">
                                    <div class="position-relative has-icon-left">
                                        <label>Usuario:</label>
                                        <input type="text" class="form-control input" name="usuario" id="usuario">
                                    </div>
                                    <div class="position-relative has-icon-left">
                                        <label>Contraseña:</label>
                                        <input type="password" class="form-control input" name="clave" id="clave">
                                    </div><br>
                                    <div class="form-group text-center" style="padding-top:10px">
                                        <input type="submit" value="Ingresar" class="btn float-right btnlogin btn-warning" id="id_ingresar" name="id_ingresar">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<script type="text/javascript" src="./Resources/js/login.js"></script>