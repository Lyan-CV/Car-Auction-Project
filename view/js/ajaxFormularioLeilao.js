$(document).ready(function(){

    $('.resposta').hide();

    $('#frmLeilao').ajaxForm({
        
        target: '.resposta',

        success:function(data){
            var tempo = 2000;
            if(data == ""){
                window.location.replace("http://localhost/TCC-GLFA/view/TelaCadastroLeilao.php");
            }else{
                $('.resposta').html(data.msg).fadeIn('slow').delay(tempo).fadeOut('slow');
                $('#frmLeilao').resetForm();
                setTimeout(location.reload.bind(location), tempo);
            }
        }

    })

});