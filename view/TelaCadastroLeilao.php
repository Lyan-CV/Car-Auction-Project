<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/TCadastroLeilao.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Para funcionar o Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js" integrity="sha512-RTxmGPtGtFBja+6BCvELEfuUdzlPcgf5TZ7qOVRmDfI9fDdX2f1IwBq+ChiELfWt72WY34n0Ti1oo2Q3cWn+kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

    <script type="text/javascript" src="js/ajaxFormularioLeilao.js"></script>
    <title>Cadastro de Leilão</title>
</head>
<body>
    <div class="items fundo">
        <a href="localhost:80/TCC-GLFA/view/TelaInicial.html">
            <img src="./img/Logo_LGFA.png" width="300" height="300" />
        </a>
        <div class ="area_form borda"> 
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center borda">Gerenciar Leilao</div>
                </div>
            </div>
            <form action="../controller/leilaoC.php"  id="frmLeilao" method="post">
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblId">Id</label><br>
                        <input type="text" name="txtID" size = 15>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblLance">Digite seu lance</label><br>
                        <input type="text" name="txtLance" size = 22>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblDataInicio">Digite a Data de inicio (ano/mes/dia)</label><br>
                        <input type="text" name="txtDataInicio" size = 10>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblDataFim">Digite a Data de Fechamento (ano/mes/dia)</label><br>
                        <input type="text" name="txtDataFim" size = 10>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblHoraInicio">Digite a Hora de Inicio (hora/min/sec)</label><br>
                        <input type="text" name="txtHoraInicio" size = 10>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblHoraFim">Digite a Hora de Fechamento (hora/min/sec)</label><br>
                        <input type="text" name="txtHoraFim" size = 10>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center resposta">Teste</div>
                    <div class="col-2"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4 text-center">
                        <button class="btn btn-success" type="submit" name="btnExcluirLeilao">Excluir pelo ID</button>
                    </div>

                    <div class="col-4 text-center">
                        <button class="btn btn-success text-center" type="submit" name="btnCadastrarLeilao">Cadastrar</button>
                    </div>

                    <div class="col-4 text-center">
                        <button class="btn btn-success text-center" type="submit" name="btnEditarLeilao">Editar pelo ID</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger" type="reset" name="btnLimpar">Limpar Tela</button>
                    </div>
                </div><br>
            </form>
            <div class="area_lista">
            <?php
                require_once('../model/leilao/leilaoDAO.php');
                $dao = new LeilaoDAO(new Leilao(null, null, null, null, null, null));
                $dao->lista();
            ?>
            </div> 
        </div>
    </div> 
</body>
</html>