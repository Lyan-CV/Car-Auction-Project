$(document).ready(function(){

    $('.resposta').hide();

    $('#frmCliente').ajaxForm({
        
        target: '.resposta',

        success:function(data){
            var tempo = 2000;
            if(data == ""){
                window.location.replace("http://localhost/TCC-GLFA/view/TelaCadastroCliente.php");
            }else{
                $('.resposta').html(data.msg).fadeIn('slow').delay(tempo).fadeOut('slow');
                $('#frmCliente').resetForm();
                setTimeout(location.reload.bind(location), tempo);
            }
        }

    })

});