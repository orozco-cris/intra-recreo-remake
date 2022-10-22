$(document).ready(function(){

    function getEmpresas(){
        var dat = {
            crud:"lisEmpresas"
        };

        $.ajax({
            data: dat,
            url:"./Model/EmpresaAjax.php",
            method: "POST",
            success: function(data){               
                $("#tblEmpresas").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getEmpresas();
});