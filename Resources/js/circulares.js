
$(document).ready(function(){


    function getCircularesAdmin(){
        var dat = {
            crud:"listCircularesParaAdmin"
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunicadoAjax.php",
            method: "POST",
            success: function(data){               
                $("#tblCirculares").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getCircularesAdmin();


    function getCircularesNoRevisadas(){
        var dat = {
            crud:"listCircularesNoRevisadasAdmin"
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunicadoAjax.php",
            method: "POST",
            success: function(data){               
                $("#tblCircularesNoR").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getCircularesNoRevisadas();



	var myEditor;

	ClassicEditor
		.create(document.querySelector("#descripcion"))
		.then(editor => {
			myEditor = editor;
		})
		.catch(err => {
			console.error(err.stack);
		});

        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#imagen + img').remove();
                    $('#imagen').after('<img src="' + e.target.result + '" style="width: 50% !important; height=12% !important ;margin-left:8%"/>');
                }
            }
        }
    
        $("#file").change(function () {
            filePreview(this);
        });


//espacioFisico
function getEspacioFisicoCircular(id){
    var dat = {
        crud:"espacioFisicoCircular",
        idEspacio:id
    };

    $.ajax({
        data: dat,
        url:"./Model/EspacioFisicoAjax.php",
        method: "POST",
        success: function(data){             
            $("#espacioFisicoCircular").html(data);
            $('.zoom').hover(function() {
                $(this).addClass('transition');
            }, function() {
                $(this).removeClass('transition');
            });
           
        },

        error: function(error){
            console.error(error);
        }
        
    });
}


function mixComercialCirculares(){
    var dat = {
        crud:"mixComercialCirculares",
    };

    $.ajax({
        data: dat,
        url:"./Model/mixComercialAjax.php",
        method: "POST",
        success: function(data){             
            $("#mixComercialCircular").html(data);
           
        },

        error: function(error){
            console.error(error);
        }
        
    });
}


  //clientes para circulares
  function listUsuariosCirculares(){
    var dat = {
        crud:"listUsuariosCirculares"
    };

    $.ajax({
        data: dat,
        url:"./Model/UsuariosAjax.php",
        method: "POST",
        success: function(data){
            $("#clienteCircular").html(data);
        },

        error: function(error){
            console.error(error);
        }
        
    });
}
listUsuariosCirculares();

//empresas para circulares
function empresasParaCirculares(){
    var dat = {
        crud:"empresasParaCirculares"
    };
    $.ajax({
        data: dat,
        url:"./Model/EmpresaAjax.php",
        method: "POST",
        success: function(data){      
            $("#empresaCircular").html(data);
        },

        error: function(error){
            console.error(error);
        }
        
    });
} 

empresasParaCirculares();

var esp;
        $("#para").change(function() {
            var option_value = $("#para").val();
            if (option_value == "1") {
                //alert("Hai !");
                $('#clientes').modal('show');
                p='Clientes';
             }else  if (option_value == "2") {
                //alert("Hai !");
             $('#empresas').modal('show');
    
             }
             else  if (option_value == "3") {
                //alert("Hai !");
                mixComercialCirculares();
             $('#mixComercial').modal('show');
    
             }else  if (option_value == "4") {
                //alert("Hai !");
                esp=1;
                getEspacioFisicoCircular(esp);
             $('#espacioFisico').modal('show');
    
             }
             else  if (option_value == "5") {
                //alert("Hai !");
                esp=2;
                getEspacioFisicoCircular(esp);
             $('#espacioFisico').modal('show');
    
             }
             else  if (option_value == "6") {
                //alert("Hai !");
                esp=3;
                getEspacioFisicoCircular(esp);
             $('#espacioFisico').modal('show');
    
             }
    
        })

        var selected = new Array() ;
        var p;
        $("#selectClientes").click(function(e){
            e.preventDefault();  
            selected = new Array() ; 
            $('#formClientes input[type=checkbox]').each(function(){
                if (this.checked) {
                    selected.push($(this).val());                  
                }
            });  
            p='Clientes';
            $('#clientes').modal('hide');
             $('.modal-backdrop').remove(); 
            console.log(selected);
            console.log(p);

        });

         
          $("#selClientes").change(function () {
            $('#formClientes input[type=checkbox]').prop('checked', $(this).prop("checked"));
        });


        $("#selectEmpresas").click(function(e){
            e.preventDefault();  
            selected = new Array() ; 
            $('#formEmpresas input[type=checkbox]').each(function(){
                if (this.checked) {
                    selected.push($(this).val());
                    
                }
            });  
            p='Empresas';
            console.log(selected);
            console.log(p);
            $('#empresas').modal('hide');
             $('.modal-backdrop').remove(); 
        });
        
        $("#selEmpresas").change(function () {
            $('#formEmpresas input[type=checkbox]').prop('checked', $(this).prop("checked"));
        });
                
        $("#selectMixes").click(function(e){
            e.preventDefault();  
            selected = new Array() ; 
            $('#formMixComercial input[type=checkbox]').each(function(){
                if (this.checked) {
                    selected.push($(this).val());
                }
            });  
            console.log("mixes",selected);
            p='Mix Comercial';
            console.log(p);
            $('#mixComercial').modal('hide');
             $('.modal-backdrop').remove(); 
            

        }); 

        $("#selMixComercial").change(function () {
            $('#formMixComercial input[type=checkbox]').prop('checked', $(this).prop("checked"));
        });

        $("#selectEspacios").click(function(e){
            e.preventDefault();  
            selected = new Array() ; 
            $('#formEspacioFisico input[type=checkbox]').each(function(){
                if (this.checked) {
                    selected.push($(this).val());
                }
            });
            p="Espacio Fisico";
            $('#espacioFisico').modal('hide');
             $('.modal-backdrop').remove(); 
            console.log("espacios",selected);   
            console.log(p);        
        }); 

        $("#selEspacioFisico").change(function () {            console.log("marcar clientes");
            $('#formEspacioFisico input[type=checkbox]').prop('checked', $(this).prop("checked"));
        });
        

        $("#registrarCircular").click(function (e) {
            e.preventDefault();
            var desc = myEditor.getData();
            var filename = $('input[type=file]').val().split('\\').pop();
            crearCircular($("#de").val(),
                selected,
                $("#asunto").val(),
                $("#mensaje").val(),
                filename,
                desc,
                $("#tipo").val(),
                p,
                $("#fechacaducidad").val());
    
        });

        $("#cancelarCircular").click(function (e) {
            $("#uploadForm")[0].reset();
            ClassicEditor.instances['#descripcion'].setData('');
        });


        function crearCircular(de, para, asunto, mensaje, image, descripcion, tipo,destinatario,fecha) {
            var formData = new FormData();
                var files = $('#file')[0].files[0];
                formData.append('file', files);
                $.ajax({
                    url: './View/upload.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                //		console.log("respuesta", data);
                        //if (response != 0) {
                            console.log("response",response);
                            var dat = {
                                crud: "createSolicitudCircular",
                                de_comunicado: de,
                                para_comunicado: para,
                                asunto_comunicado: asunto,
                                mensaje_comunicado: mensaje,
                                foto_comunicado: response,
                                detalle_comunicado: descripcion,
                                tipo_comunicado: tipo,
                                usuario: destinatario,
                                fecha_comunicado: fecha
                            };
                            console.log("datos",dat);
                            $.ajax({
                                data: dat,
                                url: "./Model/CircularAjax.php",
                                method: "POST",
                                success: function (datos) {
                                    console.log("datos1", datos);
                                    if (datos != 0) {
                                   toastr["success"]("Circular creada.", "Éxito");
                                    setTimeout(() => {
                                        window.location = "?page=home";
                                    }, 4000);
                                } else {
                                    toastr["error"]("No se puede crear la circular.", "Error");
                                }
                    }
                });

            /* } else {
                toastr["error"]("Imagen no permitida.", "Error")
            } */
        }
    });
}


//filtros de busqueda

$("#buscarcliente").keyup(function(e){
    e.preventDefault();
      clave = $("#buscarcliente").val().trim();
     if(clave){
         $('#tblClientesCirculares').find('tbody tr').hide();
         $('#tblClientesCirculares tbody tr').each(function(){
             let nombres=$(this).children().eq(1);
             if(nombres.text().toUpperCase().includes(clave.toUpperCase())){
                 $(this).show()
             }
         });
     }
     else
     {
        listUsuariosCirculares();
     }
 
 });


 $("#buscarempresa").keyup(function(e){
    e.preventDefault();
      clave = $("#buscarempresa").val().trim();
     if(clave){
         $('#tblEmpresasCirculares').find('tbody tr').hide();
         $('#tblEmpresasCirculares tbody tr').each(function(){
             let nombres=$(this).children().eq(1);
             if(nombres.text().toUpperCase().includes(clave.toUpperCase())){
                 $(this).show()
             }
         });
     }
     else
     {
        empresasParaCirculares();

     }
 
 });


 $("#buscarespaciofisico").keyup(function(e){
    e.preventDefault();
      clave = $("#buscarespaciofisico").val().trim();
     if(clave){
         $('#tblEspacioFiscoCirculares').find('tbody tr').hide();
         $('#tblEspacioFiscoCirculares tbody tr').each(function(){
             let nombres=$(this).children().eq(1);
             if(nombres.text().toUpperCase().includes(clave.toUpperCase())){
                 $(this).show()
             }
         });
     }
     else
     {
        getEspacioFisicoCircular(esp);
     }
 
 });

 
 $("#buscarmixcomercial").keyup(function(e){
    e.preventDefault();
      clave = $("#buscarmixcomercial").val().trim();
     if(clave){
         $('#tblmixComercialCirculares').find('tbody tr').hide();
         $('#tblmixComercialCirculares tbody tr').each(function(){
             let nombres=$(this).children().eq(1);
             if(nombres.text().toUpperCase().includes(clave.toUpperCase())){
                 $(this).show()
             }
         });
     }
     else
     {
        mixComercialCirculares();
     }
 
 });
 mixComercialCirculares();

});
