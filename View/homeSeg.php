<?php  
if(!isset($_SESSION["perfil"]) || $_SESSION["perfil"] == "ADM"
	|| $_SESSION["perfil"] == "SIS")
	header("Location: ?page=login");

if ($_SESSION["perfil"] == "VIS" || $_SESSION["perfil"] == "ADM")
	{ 
		echo '<div class="d-grid gap-1 d-md-flex justify-content-md-end">';		
		echo '<button class="btn btn-primary" id="btnAtras" type="button">';			
		echo '<span class="fa-solid fa-angles-left"></span>';				
		echo 'Atrás';				
		echo '</button>';				
		echo '</div>';		
	}else{
		echo '<div class="d-grid gap-1 d-md-flex justify-content-md-end">';	
		echo '<a href="?page=logout">';		
		echo '<button class="btn btn-danger" id="btnLogout" type="button">';			
		echo '<span class="fa-solid fa-right-from-bracket"></span>';				
		echo 'Cerrar sesión';				
		echo '</button>';			
		echo '</a>';		
		echo '</div>';	
	}
?>

<div class="input-group container justify-content-md-center col-12">
	<div class="col-md-12 col-sm-12 row">

		<div class="input-group">
			<label class="input-group-text" for="slcNombreDia">Día</label>
			<div class="col-md-2 col-sm-12 me-3">
				<select class="form-select" id="slcNombreDia">
					<option selected>Seleccione</option>
					<option value="Lunes">Lunes</option>
					<option value="Martes">Martes</option>
					<option value="Miercoles">Miercoles</option>
					<option value="Jueves">Jueves</option>
					<option value="Viernes">Viernes</option>
					<option value="Sabado">Sabado</option>
					<option value="Domingo">Domingo</option>
				</select>
			</div>

			<label class="input-group-text" for="slcDia"># Día</label>
			<div class="col-md-2 col-sm-12 me-3">
				<select class="form-select" id="slcDia">
					<option selected>Seleccione</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
			</div>
			<label class="input-group-text" for="slcMes"># Mes</label>
			<div class="col-md-2 col-sm-12">
				<select class="form-select" id="slcMes">
					<option selected>Seleccione</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
			</div>
			<label class="input-group-text" for="slcAnio"># Año</label>
			<div class="col-md-2 col-sm-12">
				<select class="form-select" id="slcAnio">
					<option selected>Seleccione</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
				</select>
			</div>

		</div>
		
		
	</div>
</div>

<div class="input-group container justify-content-md-center mt-5">
	<div class="col-12">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Vehículos</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Motocicletas</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Bicicletas</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Scooters</button>
			</li>
		</ul>
		<div class="tab-content mb-3" id="myTabContent">

			<!-- html de vehículos -->
			<div class="tab-pane fade show active bordecss" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
				<div class="d-grid gap-1 d-md-flex justify-content-md-end">	
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoA" name="txtAccesoA" placeholder="175">
						<label for="txtAccesoA">A</label>
					</div>
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoB" name="txtAccesoB" placeholder="175">
						<label for="txtAccesoB">B</label>
					</div>
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoC" name="txtAccesoC" placeholder="175">
						<label for="txtAccesoC">C</label>
					</div>
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoD" name="txtAccesoD" placeholder="175">
						<label for="txtAccesoD">D</label>
					</div>
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoMega" name="txtAccesoMega" placeholder="175">
						<label for="txtAccesoMega">MEGA</label>
					</div>

					<?php 
						if ($_SESSION["perfil"] == "SEG")
						{ 
							print '<button class="btn btn-success" id="btnAddVehiculo" type="button">';
							print '<span class="fa-solid fa-floppy-disk"></span>';
							print '</button>';
						}
					?>
				</div>
				<div class="d100 table-responsive" id="tablaVehiculos">
				</div>
				<button class="btn btn-success" id="btnExportVehiculos" type="button">
					<span class="fa-regular fa-file-excel"></span>
						Exportar
				</button>
			</div>

			<!-- html de motocicletas -->
			<div class="tab-pane fade bordecss" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
				<div class="d-grid gap-1 d-md-flex justify-content-md-end">	
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoPP" name="txtAccesoPP" placeholder="175">
						<label for="txtAccesoPP">PP</label>
					</div>
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoPB" name="txtAccesoPB" placeholder="175">
						<label for="txtAccesoPB">PB</label>
					</div>
					<?php 
						if ($_SESSION["perfil"] == "SEG")
						{ 
							print '<button class="btn btn-success" id="btnAddMotocicleta" type="button">';
							print '<span class="fa-solid fa-floppy-disk"></span>';
							print '</button>';
						}
					?>
				</div>
				<div class="d100 table-responsive" id="tablaMotocicletas">
				</div>
				<button class="btn btn-success" id="btnExportMotos" type="button">
					<span class="fa-regular fa-file-excel"></span>
					Exportar
				</button>
			</div>

			<!-- html de bicicletas -->
			<div class="tab-pane fade bordecss" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
				<div class="d-grid gap-1 d-md-flex justify-content-md-end">	
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoPPb" name="txtAccesoPPb" placeholder="175">
						<label for="txtAccesoPPb">PP</label>
					</div>
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoPBb" name="txtAccesoPBb" placeholder="175">
						<label for="txtAccesoPBb">PB</label>
					</div>

					<?php 
						if ($_SESSION["perfil"] == "SEG")
						{ 
							print '<button class="btn btn-success" id="btnAddBicicleta" type="button">';
							print '<span class="fa-solid fa-floppy-disk"></span>';
							print '</button>';
						}
					?>
				</div>
				<div class="d100 table-responsive" id="tablaBicicletas">
				</div>
				<button class="btn btn-success" id="btnExportBicis" type="button">
					<span class="fa-regular fa-file-excel"></span>
					Exportar
				</button>
			</div>

			<!-- html de scooters -->
			<div class="tab-pane fade bordecss" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
				<div class="d-grid gap-1 d-md-flex justify-content-md-end">	
					<div class="form-floating me-3">
						<input type="number" class="form-control" id="txtAccesoPBs" name="txtAccesoPBs" placeholder="175">
						<label for="txtAccesoPBs">PB</label>
					</div>

					<?php 
						if ($_SESSION["perfil"] == "SEG")
						{ 
							print '<button class="btn btn-success" id="btnAddScooter" type="button">';
							print '<span class="fa-solid fa-floppy-disk"></span>';
							print '</button>';
						}
					?>
					
				</div>
				<div class="d100 table-responsive" id="tablaScooter">
				</div>
				<button class="btn btn-success" id="btnExportScoos" type="button">
					<span class="fa-regular fa-file-excel"></span>
					Exportar
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal vehiculos -->
<div id="modalVehiculo" class="modal" data-backdrop="static" data-keyboard="false" tabindex="0" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- cabecera del diálogo -->
      <div class="modal-header bg-primary text-light">
        <h4 class="modal-title">Vehículo:</h4>
      </div>
      <!-- cabecera del diálogo -->
      <form class="d100" id="frmInspeccion" method="POST">
        <!-- cuerpo del diálogo -->
        <div class="modal-body">              
          <div class="d100 dcentro">
		  <input type="hidden" id="idFechaV">

			<div class="d100 dcentro-v row mb-3">
				<strong class="col-md-1 text-sm-right form-group">A:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoAV" name="txtAccesoAV" class="form-control" autocomplete="off" placeholder="A">
				</div>
				<strong class="col-md-1 text-sm-right">B:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoBV" name="txtAccesoBV" class="form-control" autocomplete="off" placeholder="B">
            	</div>
          	</div>

			  <div class="d100 dcentro-v row mb-3">
				<strong class="col-md-1 text-sm-right form-group">C:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoCV" name="txtAccesoCV" class="form-control" autocomplete="off" placeholder="C">
				</div>
				<strong class="col-md-1 text-sm-right">D:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoDV" name="txtAccesoDV" class="form-control" autocomplete="off" placeholder="D">
            	</div>
          	</div>

			  <div class="d100 dcentro-v row mb-3">
				<strong class="col-md-1 text-sm-right form-group">MEGA:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoMegaV" name="txtAccesoMegaV" class="form-control" autocomplete="off" placeholder="MEGA">
				</div>
          	</div>

          </div>
        </div> 
        <!-- cuerpo del diálogo -->
        
        <!-- pie del diálogo -->
        <div class="modal-footer">
          <div class="d100 dcentro">
            <strong class="col-md-12 text-sm-right form-group" >
				
              	<button type="button" class="btn btn-white" id="btnCerrarVeh" data-dismiss="modal">Cancelar</button>
			  	<button type="button" class="btn btn-primary" id="btnEditarVeh" data-dismiss="modal">Guardar</button>
            </strong>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> 

<!-- Modal motocicletas -->
<div id="modalMotocicleta" class="modal" data-backdrop="static" data-keyboard="false" tabindex="0" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- cabecera del diálogo -->
      <div class="modal-header bg-primary text-light">
        <h4 class="modal-title">Motocicleta:</h4>
      </div>
      <!-- cabecera del diálogo -->
      <form class="d100" id="frmInspeccion" method="POST">
        <!-- cuerpo del diálogo -->
        <div class="modal-body">              
          <div class="d100 dcentro">
		  <input type="hidden" id="idFechaM">

			<div class="d100 dcentro-v row mb-3">
				<strong class="col-md-1 text-sm-right form-group">PP:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoPPM" name="txtAccesoPPM" class="form-control" autocomplete="off" placeholder="PP">
				</div>
				<strong class="col-md-1 text-sm-right">PB:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoPBM" name="txtAccesoPBM" class="form-control" autocomplete="off" placeholder="PB">
            	</div>
          	</div>

          </div>
        </div> 
        <!-- cuerpo del diálogo -->
        
        <!-- pie del diálogo -->
        <div class="modal-footer">
          <div class="d100 dcentro">
            <strong class="col-md-12 text-sm-right form-group" >
              	<button type="button" class="btn btn-white" id="btnCerrarMot" data-dismiss="modal">Cancelar</button>
			  	<button type="button" class="btn btn-primary" id="btnEditarMot" data-dismiss="modal">Guardar</button>
            </strong>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> 

<!-- Modal Bicicletas -->
<div id="modalBicicleta" class="modal" data-backdrop="static" data-keyboard="false" tabindex="0" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- cabecera del diálogo -->
      <div class="modal-header bg-primary text-light">
        <h4 class="modal-title">Bicicleta:</h4>
      </div>
      <!-- cabecera del diálogo -->
      <form class="d100" id="frmInspeccion" method="POST">
        <!-- cuerpo del diálogo -->
        <div class="modal-body">              
          <div class="d100 dcentro">
		  <input type="hidden" id="idFechaB">

			<div class="d100 dcentro-v row mb-3">
				<strong class="col-md-1 text-sm-right form-group">PP:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoPPB" name="txtAccesoPPB" class="form-control" autocomplete="off" placeholder="PP">
				</div>
				<strong class="col-md-1 text-sm-right">PB:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoPBB" name="txtAccesoPBB" class="form-control" autocomplete="off" placeholder="PB">
            	</div>
          	</div>

          </div>
        </div> 
        <!-- cuerpo del diálogo -->
        
        <!-- pie del diálogo -->
        <div class="modal-footer">
          <div class="d100 dcentro">
            <strong class="col-md-12 text-sm-right form-group" >
              	<button type="button" class="btn btn-white" id="btnCerrarBic" data-dismiss="modal">Cancelar</button>
			  	<button type="button" class="btn btn-primary" id="btnEditarBic" data-dismiss="modal">Guardar</button>
            </strong>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> 

<!-- Modal Scooters -->
<div id="modalScooter" class="modal" data-backdrop="static" data-keyboard="false" tabindex="0" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- cabecera del diálogo -->
      <div class="modal-header bg-primary text-light">
        <h4 class="modal-title">Scooter:</h4>
      </div>
      <!-- cabecera del diálogo -->
      <form class="d100" id="frmInspeccion" method="POST">
        <!-- cuerpo del diálogo -->
        <div class="modal-body">              
          <div class="d100 dcentro">
		  <input type="hidden" id="idFechaS">

			<div class="d100 dcentro-v row mb-3">
				<strong class="col-md-1 text-sm-right form-group">PP:</strong>
				<div class="col-md-5 form-group">
				<input type="number" id="txtAccesoPBS" name="txtAccesoPBS" class="form-control" autocomplete="off" placeholder="PB">
				</div>
          	</div>

          </div>
        </div> 
        <!-- cuerpo del diálogo -->
        
        <!-- pie del diálogo -->
        <div class="modal-footer">
          <div class="d100 dcentro">
            <strong class="col-md-12 text-sm-right form-group" >
              	<button type="button" class="btn btn-white" id="btnCerrarScoo" data-dismiss="modal">Cancelar</button>
			  	<button type="button" class="btn btn-primary" id="btnEditarScoo" data-dismiss="modal">Guardar</button>
            </strong>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> 

<script type="text/javascript" src="./Resources/js/general.js"></script>
<script type="text/javascript" src="./Resources/js/depSeguridad.js"></script>
