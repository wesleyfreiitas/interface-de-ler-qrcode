<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Seu Título Aqui</title>
	<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .centralized-table {
        width: 80%; /* ou o valor desejado */
    }
</style>

</head>

<body>

	
	<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
		<div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <?php if (isset($_SESSION['login'])) { ?>
                    <a class="navbar-item" href="logout.php">
						<?php echo $_SESSION['usuario']; ?>
                        (sair)
                    </a>
					<?php } ?>
				</div>
				
				<div class="navbar-end">
					<div class="navbar-item">
						<div class="buttons">
							<?php if (!isset($_SESSION['login'])) { ?>
								<a class="button is-light" href="login.php">
									<strong>Login</strong>
								</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</nav>
			
			<div class="container"> <!-- Adicionado um contêiner para centralizar o conteúdo -->
    <div class="has-text-centered"> <!-- Adicionado para centralizar o conteúdo -->
        <table class="table is-hoverable is-striped" id="instancias">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Instancia</th>
                    <th>Token</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $usuario = $_SESSION['usuario'];

                $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                $select = mysqli_query($conexao, $query);

                while ($linha = mysqli_fetch_array($select)) {
                    $cnpj_usuario = $linha['cnpj'];
                }

                $query = "SELECT u.name, u.usuario, i.descricao, i.id, i.token, i.instancia
                    FROM usuarios u
                    JOIN instancias i ON u.cnpj = i.cnpj
                    WHERE u.cnpj = '$cnpj_usuario';";

                $consulta_instancias = mysqli_query($conexao, $query);

                while ($linha = mysqli_fetch_array($consulta_instancias)) {
                    echo '<tr>';
                    echo '<td>' . $linha['descricao'] . '</td>';
                    echo '<td>' . $linha['instancia'] . '</td>';
                    echo '<td>' . $linha['token'] . '</td>';
                
                    // Adicione a coluna Status na tabela
                    $status = getStatus($linha['instancia'], $linha['token']);
                    // echo '<td>' . $status . '</td>';
                
                    // Adicione botão ou QRCode com base no status
                    echo '<td>';
                    if ($status == 'connected') {
                        echo '<button class="button is-success">Conectado</button>';
                    }  else {
                        echo '<a class="button is-warning qrCodeButton" data-instancia="' . $linha['instancia'] . '" data-token="' . $linha['token'] . '">QRCode</a>';
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                
                // Função para obter o status
                function getStatus($instancia, $token) {
                    $url = 'https://api.z-api.io/instances/' . $instancia . '/token/' . $token . '/status';
                    $response = file_get_contents($url);
                    $data = json_decode($response, true);
                
                    return $data['connected'] ? 'connected' : 'disconnected';
                }
                
                ?>
                <!-- Adicione isso antes do fechamento da tag </body> -->
                <div class="modal" id="qrCodeModal">
                    <div class="modal-background"></div>
                    <div class="modal-content">
                        <div id="qrcode"></div>
                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        function consultarQRCode(instancia, token) {
                            $.ajax({
                                url: 'https://api.z-api.io/instances/' + instancia + '/token/' + token + '/qr-code',
                                type: 'GET',
                                success: function(data) {
                                    if (data.connected == true) {
                                        alert('Instancia já conectada');
                                    } else {
                                        var qrCodeData = data.value;
                                        var url = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' + encodeURIComponent(qrCodeData)

                                        // Limpar o conteúdo anterior da div
                                        $('#qrcode').empty();

                                        // Inserir o QR Code na div com id "qrcode"
                                        $('#qrcode').html('<img src="' + url + '" alt="QR Code">');

                                        // Exibir a modal
                                        $('#qrCodeModal').addClass('is-active');

                                        // Configurar o fechamento da modal após 15 segundos
                                        setTimeout(function() {
                                            $('#qrCodeModal').removeClass('is-active');
                                        }, 15000);
                                    }
                                },
                                error: function() {
                                    alert('Erro ao obter QR Code.');
                                }
                            });
                        }

                        // Clique no botão QRCode
                        $('.qrCodeButton').click(function() {
                            var instancia = $(this).data('instancia');
                            var token = $(this).data('token');

                            consultarQRCode(instancia, token);
                        });

                        // Fechar modal ao clicar no botão de fechar ou fora da modal
                        $('.modal-close, .modal-background').click(function() {
                            $('#qrCodeModal').removeClass('is-active');
                        });
                    });
                </script>

            </tbody>
        </table>
    </div> <!-- Fechamento da div com classe has-text-centered -->

</div> <!-- Fechamento do contêiner -->

</body>
</html>
