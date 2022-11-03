<!-- crear nuevo espacio fisico -->

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
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Crear espacio físico</h5>
                                
                            </div>
                        <form class="form form-horizontal" style="padding-top: 3%" id="espacio_fisico">
                            <div class="form-body">
                                
                                <div class="row">
                                    <div class="col-md-2" style="padding:10px">
                                        <strong><label> Denominacion</label></strong>
                                    </div>
                                    <div class="col-md-4 form-group" style="padding:10px">
                                        <input class="form-control" type="text" id="denominacion">
                                    </div>
                                    <div class="col-md-2" style="padding:10px"> 
                                        <strong><label> Ubicacion </label></strong>                           
                                    </div>                        
                                    <div class="col-md-4 form-group" style="padding:10px">
                                        <input class="form-control" type="text" id="ubicacion">
                                    </div>                                                                                         
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:10px">
                                        <strong><label> Medidas</label></strong>
                                    </div>
                                    <div class="col-md-4 form-group" style="padding:10px">
                                        <input class="form-control" type="text" id="medidas">
                                    </div>
                                    <div class="col-md-2" style="padding:10px"> 
                                        <strong><label> Tipo</label></strong>
                                    </div>
                                    <div class="col-md-4 form-group" style="padding:10px">
                                       <select id="tipo"class="form-control">
                                            <option value="1">Local </option>
                                            <option value="2">Isla </option>
                                            <option value="3">Publicidad </option>
                                       </select>
                                    </div>                                                                                             
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:10px">
                                        <strong><label> Estado</label></strong>
                                    </div>
                                    <div class="col-md-4 form-group" style="padding:10px">
                                        <select id="estado"class="form-control">
                                            <option value="1">Activo </option>
                                            <option value="0">Inactivo </option>
                                       </select>
                                    </div>
                                    <div class="col-md-2" style="padding:10px"> 
                                        <strong><label> Codigo</label></strong>
                                    </div>
                                    <div class="col-md-4 form-group" style="padding:10px">
                                        <input class="form-control" type="text" id="codigo">
                                    </div>                                                                                                
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:10px">
                                        <strong><label> Etapa</label></strong>
                                    </div>
                                    <div class="col-md-4 form-group" style="padding:10px" id="listEtapa">
                                        
                                    </div>    
                                    <div class="col-md-2" style="padding:10px">                             
                                    </div>
                                    <div class="col-md-4" style="padding:10px">                             
                                    </div>
                                                                                                                                                                                
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-2" style="padding:10px">
                                        <strong><label> Caracteristicas</label></strong>
                                    </div>
                                    <div class="col-md-10 form-group" style="padding:10px">
                                        <textarea type="text" class="fom-control" id="caracteristicas" rows="3" style="width:100% !important"></textarea> 
                                    </div>                                                                                                                                                                    
                                </div>
                                <div class="row" id="val">  
                                    <div class="col-md-2" style="padding:10px"></div>   
                                    <div class="col-md-8 form-group" id="imagen" style="position:absolute">
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:10px">
                                        <strong><label> Imagen</label></strong>
                                    </div>   
                                    <div class="col-md-8 form-group">
                                            <input type="file" class="btn btn-primary" id="file" name="file" accept="image/gif, image/jpeg, image/png">
                                    </div>   
                                </div>  
                            </div>
                        </form>
                    
                    
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-10 form-group"></div>
                            <div class="col-md-1 form-group" style="padding-top:3%">
                                <input type="button" class="btn btn-danger"  id="cancelar" value="Cancelar">
                            </div>
                            <div class="col-md-1 form-group"  style="padding-top:3%">
                                <input class="btn btn-primary"  id="crear" type="submit"  value="Crear">
                            </div>
                        </div>
                    </div>

                </div>
            </div>         
        </div>

    </div>
    
</div>

<script type="text/javascript" src="./Resources/js/etapaComercial.js"></script>
<script type="text/javascript" src="./Resources/js/espacioFisico.js"></script>