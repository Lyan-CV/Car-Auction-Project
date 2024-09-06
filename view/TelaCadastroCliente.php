<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/TCadastroCliente.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Para funcionar o Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js" integrity="sha512-RTxmGPtGtFBja+6BCvELEfuUdzlPcgf5TZ7qOVRmDfI9fDdX2f1IwBq+ChiELfWt72WY34n0Ti1oo2Q3cWn+kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

    <script type="text/javascript" src="js/ajaxFormularioCliente.js"></script>

    <title>Gerenciar Cliente</title>
</head>
<body>
    <div class="items fundo">
        <a href="localhost:80/TCC-GLFA/view/TelaInicial.html">
            <img src="./img/Logo_LGFA.png" width="300" height="300" />
        </a>
        <div class="area_form borda">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center borda">Gerenciar Leilao</div>
                </div>
            </div>
            <form action="../controller/clienteC.php"  id="frmCliente" method="post">
                <br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblCpf">CPF</label><br>
                        <input type="text" name="txtCpf" size="20">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblTelefone">Telefone</label><br>
                        <input type="text" name="txtTelefone" size="15">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblNome">Nome</label><br>
                        <input type="text" name="txtNome" size="20">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblEmail">Email</label><br>
                        <input type="email" name="txtEmail" size="20">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="lblDataNasc">Data de nascimento (ano/mes/dia)</label><br>
                        <input type="text" name="txtDataNasc" size="15">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center resposta">Teste</div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-4 text-center">
                        <button class="btn btn-success" type="submit" name="btnExcluirCliente">Excluir pelo CPF</button>
                    </div>

                    <div class="col-4 text-center">
                        <button class="btn btn-success text-center" type="submit" name="btnCadastrarCliente">Cadastrar</button>
                    </div>

                    <div class="col-4 text-center">
                        <button class="btn btn-success text-center" type="submit" name="btnEditarCliente">Editar pelo CPF</button>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger" type="reset" name="btnLimpar">Limpar Tela</button>
                    </div>
                </div><br>
            </form>
            <div class="area_lista">
            <?php
                require_once('../model/cliente/clienteDAO.php');
                $dao = new ClienteDAO(new Cliente(null, null, null, null, null));
                $dao->Lista();
            ?>
            </div>
        </div>
    </div>
</body>
</html>