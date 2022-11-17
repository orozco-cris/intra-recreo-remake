
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
                $var=1;
                getEspacioFisicoCircular($var);
             $('#espacioFisico').modal('show');
    
             }
             else  if (option_value == "5") {
                //alert("Hai !");
                $var=2;
                getEspacioFisicoCircular($var);
             $('#espacioFisico').modal('show');
    
             }
             else  if (option_value == "6") {
                //alert("Hai !");
                $var=3;
                getEspacioFisicoCircular($var);
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
            console.log(selected);
           
        });

      /*   $('#todosClientes').change(function() {
            $('#formClientes input[type=checkbox]').prop('checked', $(this).is(':checked'));
          });*/

$('#todosClientes').click(function(e){
    console.log("entro");
    e.preventDefault();  
            $('#formClientes input[type="checkbox"]').prop('checked',
            $("#todosClientes").is(':checked'));
          }); 
   



       /*    
          $("#todosClientes").click(function(event){
            console.log("selecciona");
            if($(this).is(":checked")) {
                $('input:checkbox[id=id_clientes]:checked');
               
                /*  $(".ckClientes:checkbox:not(:checked)").prop("checked", true);
            }else{
                $(".ckClientes:checkbox:checked").prop("checked",false);
            }
          }); 
          */
   
        
        $("#selectEmpresas").click(function(e){
            e.preventDefault();  
            selected = new Array() ; 
            $('#formEmpresas input[type=checkbox]').each(function(){
                if (this.checked) {
                    selected.push($(this).val());
                    
                }
            });  
            p='Empresas';
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
            p='Mis Comercial';
        }); 
        
        $("#selectEspacios").click(function(e){
            e.preventDefault();  
            selected = new Array() ; 
            $('#formEspacioFisico input[type=checkbox]').each(function(){
                if (this.checked) {
                    selected.push($(this).val());
                }
            });
            p='Espacio Fisico';
            console.log("espacios",selected);           
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
                                     toastr["success"]("CIRCULAR CREADA.", "Éxito");
                                    setTimeout(() => {
                                        window.location = "?page=home";
                                    }, 4000);
                                } else {
                                    toastr["error"]("No se puedo crear la circular.", "Error");
                                }
                    }
                });

            /* } else {
                toastr["error"]("Imagen no permitida.", "Error")
            } */
        }
    });
}


});
