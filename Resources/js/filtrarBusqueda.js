
$(document).ready(function(){

/* 

    function getFiltrarArriendos(){
                var consulta;
                                                                                    
            //hacemos focus al campo de búsqueda
            $("#empresa").focus();
                                                                                                    
            //comprobamos si se pulsa una tecla
            $("#empresa").keyup(function(e){
                                        
                //obtenemos el texto introducido en el campo de búsqueda
                consulta = $("#empresa").val();
                                                                            
                //hace la búsqueda
                var dat = {
                    crud:"filtrarArriendos",
                    campo:consulta
                };
                                                                                    
                $.ajax({
                    data: dat,
                    url:"./Model/ArriendoAjax.php",
                    method: "POST",
                    success: function(data){
                        console.log("data",data);
                        $("#tblArriendos").html(data);
                        
                    },

                    error: function(error){
                        console.error(error);
                    }
                    
                });                                                                        
                                                                            
            });
        }

        getFiltrarArriendos();


    function getFiltrarEmpresas(){
            var consulta;
                                                                                
        //hacemos focus al campo de búsqueda
        $("#buscarempresa").focus();
                                                                                                
        //comprobamos si se pulsa una tecla
        $("#buscarempresa").keyup(function(e){
                                    
            //obtenemos el texto introducido en el campo de búsqueda
            consulta = $("#buscarempresa").val();
                                                                        
            //hace la búsqueda
            var dat = {
                crud:"buscarEmpresaArriendo",
                campo:consulta
            };
                                                                                
            $.ajax({
                data: dat,
                url:"./Model/EmpresaAjax.php",
                method: "POST",
                success: function(data){
                    console.log("data",data);
                    $("#listEmpresas").html(data);
                    
                },

                error: function(error){
                    console.error(error);
                }
                
            });                                                                        
                                                                        
        });
    }

    getFiltrarEmpresas();



    function getFiltrarEspacioFisico(){
        var consulta;
                                                                            
    //hacemos focus al campo de búsqueda
    $("#buscardenominacion").focus();
                                                                                            
    //comprobamos si se pulsa una tecla
    $("#buscardenominacion").keyup(function(e){
                                
        //obtenemos el texto introducido en el campo de búsqueda
        consulta = $("#buscardenominacion").val();
                                                                    
        //hace la búsqueda
        var dat = {
            crud:"buscarEspacioFisico",
            campo:consulta
        };
                                                                            
        $.ajax({
            data: dat,
            url:"./Model/EspacioFisicoAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#listDenominacion").html(data);
                
            },

            error: function(error){
                console.error(error);
            }
            
        });                                                                        
                                                                    
    });
}

getFiltrarEspacioFisico();
 */

function getArriendos(){
    var dat = {
        crud:"listArriendos"
    };

    $.ajax({
        data: dat,
        url:"./Model/ArriendoAjax.php",
        method: "POST",
        success: function(data){
            console.log("data",data);
            $("#tblArriendos").html(data);
            
        },

        error: function(error){
            console.error(error);
        }
        
    });
}



$("#entradas").keyup(function(e){
   e.preventDefault();
     clave = $("#entradas").val().trim();
    if(clave){
        $('table').find('tbody tr').hide();
        $('table tbody tr').each(function(){
            let nombres=$(this).children().eq(0);
            if(nombres.text().toUpperCase().includes(clave.toUpperCase())){
                $(this).show()
            }
        });
    }
    else
    {
        getArriendos();
    }

});

$("#denominacion").keyup(function(e){
    e.preventDefault();
      clave = $("#denominacion").val().trim();
     if(clave){
         $('table').find('tbody tr').hide();
         $('table tbody tr').each(function(){
             let nombres=$(this).children().eq(2);
             if(nombres.text().toUpperCase().includes(clave.toUpperCase())){
                 $(this).show()
             }
         });
     }
     else
     {
         getArriendos();
     }
 
 });

});