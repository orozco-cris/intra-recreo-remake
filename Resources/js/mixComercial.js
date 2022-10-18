$(document).ready(function(){

    function getMixComerciales(){
        var dat = {
            crud:"listMixComerciales"
        };

        $.ajax({
            data: dat,
            url:"./Model/mixComercialAjax.php",
            method: "POST",
            success: function(data){               
                $("#tblMixComercial").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getMixComerciales();

});