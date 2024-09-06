<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/TCadastroV.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Para funcionar o Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js" integrity="sha512-RTxmGPtGtFBja+6BCvELEfuUdzlPcgf5TZ7qOVRmDfI9fDdX2f1IwBq+ChiELfWt72WY34n0Ti1oo2Q3cWn+kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

    <script type="text/javascript" src="js/ajaxFormularioV.js"></script>

    <title>Cadastro de Veículo</title>
</head>
<body>
    <div class="items fundo">
        <a href="localhost:80/TCC-GLFA/view/TelaInicial.html">
            <img src="./img/Logo_LGFA.png" width="300" height="300" />
        </a>
        <div class="area_form borda">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center borda">Gerenciar Veículo</div>
                </div>
            </div>
            <br>
            <form action="../controller/veiculoC.php"  id="frmVeiculo" method="post">
            <div class="row">
                <div class="col-6 text-center"></div>
                <div class="col-3">
                    <label for="lblID">Id</label>
                    <br>
                    <input type="text" name="txtId" size="25" />
                </div>
            </div>

            <div class="row">
                <div class="col-6 text-center"></div>
                <div class="col-6">
                    <label for="lblModelo">Modelo</label>
                    <br>
                    <input type="text" name="txtModelo" size="25" />
                </div>
            </div>

            <div class="row">
                <div class="col-6 text-center">
                    <label for="lblMarca">Marca</label>
                    <br>
                    <input type="text" name="txtMarca" size="20" />
                </div>
                <div class="col-6">
                    <label for="lblAno">Ano</label>
                    <br>
                    <input type="text" name="txtAno" size="8" />
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-center">
                    <label for="lblCor">Cor</label>
                    <br>
                    <input type="text" name="txtCor" size="20" />                   
                </div>
                <div class="col-6">
                    <label for="lblFipe">Fipe</label>
                    <br>
                    <input type="text" name="txtFipe" size="20" />
                </div>
            </div>

            <div class="row">
                <div class="col-6 text-center">
                    <label for="lblMotor">Motor</label>
                    <br>
                    <input type="text" name="txtMotor" size="20" />                   
                </div>
                <div class="col-6">
                    <label for="lblSinistro">Sinistro</label>
                    <br>
                    <input type="text" name="txtSinistro" size="30" />
                </div>
            </div>

            <div class="row">
                <div class="col-6 text-center">
                    <label for="lblCambio">Cambio</label>
                    <br>
                    <input type="text" name="txtCambio" size="20" /> 
                </div>
                <div class="col-6">
                    <label for="lblCondicao">Condição</label>
                    <br>
                    <input type="text" name="txtCondicao" size="45" />
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="col-12 text-center">
                        <label for="lblQuilometragem">Quilometragem</label>
                        <br>
                        <input type="text" name="txtQuilometragem" size="20" />
                    </div>
                </div>
                <div class="col-6">
                    <label for="lblCombustivel">Combustível</label>
                    <br>
                    <input type="text" name="txtCombustivel" size="20" />
                </div>
            </div>

            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <label for="lblLanceInicial">Lance Inicial</label>
                    <br>
                    <input type="text" name="txtLanceInicial" size="30" />
                </div>
            </div> 
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center resposta">Teste</div>
                <div class="col-2"></div>
            </div>
            <br><br><br><br>

            <div class="row">

                <div class="col-4 text-center">
                    <button class="btn btn-success" type="submit" name="btnExcluir">Excluir pelo ID</button>
                </div>

                <div class="col-4 text-center">
                    <button class="btn btn-success text-center" type="submit" name="btnCadastrar">Cadastrar</button>
                </div>

                <div class="col-4 text-center">
                    <button class="btn btn-success text-center" type="submit" name="btnEditar">Editar pelo ID</button>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger" type="reset" name="btnLimpar">Limpar Tela</button>
                    </div>
                </div><br>
            </form>
            </div>
            <div class="area_lista">
            <?php
                require_once('../model/veiculo/veiculoDAO.php');
                $dao = new VeiculoDAO(new Veiculo(null, null, null, null, null,null,null,null,null,null,null,null,null));
                $dao->lista();
            ?>
            </div>
        </div>
        <div></div>
        <br><br><br><br><br>

    </div>

</body>

</html>