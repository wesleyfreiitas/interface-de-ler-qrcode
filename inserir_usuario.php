<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
    <div class="container has-text-centered">
        <?php if (!isset($_GET['editar'])) { ?>
            <h1 class="title">Cadastro de usuário</h1>

            <form method="POST" action="processa_usuario.php" class="box">
                <div class="field">
                    <label class="label">Nome</label>
                    <div class="control">
                        <input class="input" type="text" name="nome" placeholder="Insira seu nome">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email:</label>
                    <div class="control">
                        <input class="input" type="email" name="usuario" placeholder="Insira seu e-mail">
                    </div>
                </div>

                <div class="field">
                    <label class="label">CNPJ:</label>
                    <div class="control">
                        <input class="input" type="text" name="cnpj" placeholder="Insira seu CNPJ">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Senha:</label>
                    <div class="control">
                        <input type="password" class="input" name="senha" placeholder="Digite sua senha">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Confirma Senha:</label>
                    <div class="control">
                        <input type="password" class="input" placeholder="Confirme sua senha">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="submit" class="button is-success" value="Cadastrar">
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <?php while ($linha = mysqli_fetch_array($consulta_instancias)) { ?>
                <?php if ($linha['id_instancia'] == $_GET['editar']) { ?>
                    <h1 class="title">Editar instância</h1>
                    <form method="post" action="edita_instancia.php" class="box">
                        <input type="hidden" name="id_instancia" value="<?php echo $linha['id_instancia']; ?>">

                        <div class="field">
                            <label class="label">Descrição instância:</label>
                            <div class="control">
                                <input class="input" type="text" name="descricao_instancia" placeholder="Insira o nome da instância" value="<?php echo $linha['descricao_instancia']; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Instância:</label>
                            <div class="control">
                                <input class="input" type="text" name="instancia" placeholder="Insira o nome da instância" value="<?php echo $linha['instancia']; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Token:</label>
                            <div class="control">
                                <input class="input" type="text" name="token" placeholder="Insira o Token" value="<?php echo $linha['token']; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="button is-success" type="submit" value="Editar instância">
                            </div>
                        </div>
                    </form>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <?php include './views/partials/footer.php'; ?>
</body>

</html>
