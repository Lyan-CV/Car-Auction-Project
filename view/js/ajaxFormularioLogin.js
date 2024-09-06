$(document).ready(function(){

    $('.resposta').hide();

    $('#frmUsuario').ajaxForm({
        
        target: '.resposta',

        success:function(data){
            var tempo = 2000;
            if(data == ""){
                window.location.replace("http://localhost:80/TCC-GLFA/view/TelaInicial.html");
            }else{
                $('.resposta').html(data.msg).fadeIn('slow').delay(tempo).fadeOut('slow');
                $('#frmUsuario').resetForm();
                setTimeout(location.reload.bind(location), tempo);
            }
        }

    })

});