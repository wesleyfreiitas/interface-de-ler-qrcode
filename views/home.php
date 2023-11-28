<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
	
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Bem-vindos</h1>

            <form method="post" action="login.php">
                <div class="field">
                    <label class="label">Usuário:</label>
                    <div class="control">
                        <input type="text" name="usuario" placeholder="Nome do usuário" class="input">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Senha:</label>
                    <div class="control">
                        <input type="password" name="senha" placeholder="Digite a senha" class="input">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="submit" value="Entrar" class="button is-success">
                    </div>
                </div>
            </form>

            <a href="./inserir_usuario.php">Cadastre-se</a>

            <?php if (isset($_GET['erro'])) { ?>
                <div class="notification is-danger">
                    Usuário e/ou senha inválidos.
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>
