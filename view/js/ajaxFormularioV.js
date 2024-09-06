$(document).ready(function(){

    $('.resposta').hide();

    $('#frmVeiculo').ajaxForm({
        
        target: '.resposta',

        success:function(data){
            var tempo = 2000;
            if(data == ""){
                window.location.replace("http://localhost/TCC-GLFA/view/TelaCadastroV.html");
            }else{
                $('.resposta').html(data.msg).fadeIn('slow').delay(tempo).fadeOut('slow');
                $('#frmVeiculo').resetForm();
                setTimeout(location.reload.bind(location), tempo);
            }
        }

    })

});