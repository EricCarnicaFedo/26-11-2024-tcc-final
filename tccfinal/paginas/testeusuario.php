<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Perfil</title>
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --background-color: #f4f4f4;
            --card-background: #ffffff;
            --text-color: #333333;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: var(--card-background);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }

        h2 {
            color: var(--primary-color);
            margin-top: 0;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        input[type="submit"] {
            margin-top: 1.5rem;
            padding: 0.75rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: var(--primary-dark);
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
            display: block;
            border: 3px solid var(--primary-color);
        }

        .message {
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background-color: var(--success-color);
            color: white;
        }

        .error {
            background-color: var(--error-color);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Dados de conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'tccdois';
        $username = 'root';  // Seu usuário do banco de dados
        $password = '';      // Sua senha do banco de dados

        try {
            // Conectando com o banco de dados usando PDO
            $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }

        // ID fixo para o teste
        $userId = 17;

        // Consulta SQL para buscar o usuário no banco
        $query = "SELECT * FROM usuarios WHERE id = :userId";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário foi encontrado
        if ($user === false) {
            echo "<p class='message error'>Usuário não encontrado!</p>";
            exit;
        }

        // Caso o formulário tenha sido enviado para atualizar o perfil
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtendo dados do formulário
            $nomeNovo = $_POST['nome'];
            $emailNovo = $_POST['email'];
            $senhaAtual = isset($_POST['senha_atual']) ? $_POST['senha_atual'] : '';
            $senhaNova = isset($_POST['senha_nova']) ? $_POST['senha_nova'] : '';
            $fotoNova = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '';

            // Verificando se a senha atual foi fornecida e se ela é correta
            if (!empty($senhaAtual)) {
                // Comparar a senha atual com a senha no banco de dados (usando md5)
                if (md5($senhaAtual) !== $user['senha']) {
                    echo "<p class='message error'>Senha atual incorreta!</p>";
                    exit;
                }
            }

            // Validando se o nome ou o email foi alterado
            if ($nomeNovo != $user['nome']) {
                $updateQuery = "UPDATE usuarios SET nome = :nome WHERE id = :userId";
                $stmt = $conexao->prepare($updateQuery);
                $stmt->bindParam(':nome', $nomeNovo, PDO::PARAM_STR);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
            }

            if ($emailNovo != $user['email']) {
                $updateQuery = "UPDATE usuarios SET email = :email WHERE id = :userId";
                $stmt = $conexao->prepare($updateQuery);
                $stmt->bindParam(':email', $emailNovo, PDO::PARAM_STR);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
            }

            // Se a senha nova foi preenchida, vamos atualizar
            if (!empty($senhaNova)) {
                // Criptografar a senha nova com md5
                $senhaNovaCriptografada = md5($senhaNova);
                $updateQuery = "UPDATE usuarios SET senha = :senha WHERE id = :userId";
                $stmt = $conexao->prepare($updateQuery);
                $stmt->bindParam(':senha', $senhaNovaCriptografada, PDO::PARAM_STR);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
            }

            // Processando a foto do perfil
            if (!empty($fotoNova)) {
                $fotoDestino = 'uploads/' . $fotoNova;
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fotoDestino)) {
                    // Atualizando a foto na tabela usuarios_perfil
                    $updateQuery = "UPDATE usuarios_perfil SET foto = :foto WHERE id = :userId";
                    $stmt = $conexao->prepare($updateQuery);
                    $stmt->bindParam(':foto', $fotoDestino, PDO::PARAM_STR);
                    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                    $stmt->execute();
                } else {
                    echo "<p class='message error'>Erro ao subir a foto!</p>";
                }
            }

            // Mensagem de sucesso
            echo "<p class='message success'>Perfil atualizado com sucesso!</p>";
        }

        // Exibindo a foto de perfil atual, se existir
        $queryFoto = "SELECT foto FROM usuarios_perfil WHERE id = :userId";
        $stmt = $conexao->prepare($queryFoto);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $fotoPerfil = $stmt->fetch(PDO::FETCH_ASSOC);

        // Exibindo a foto, se existir
        if ($fotoPerfil && $fotoPerfil['foto']) {
            echo '<img src="' . htmlspecialchars($fotoPerfil['foto']) . '" alt="Foto de Perfil" class="profile-pic">';
        } else {
            echo '<img src="https://via.placeholder.com/150" alt="Sem foto de perfil" class="profile-pic">';
        }
        ?>

        <h2>Atualizar Perfil</h2>
        
        <form action="testeusuario.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($user['nome']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <label for="senha_atual">Senha Atual:</label>
            <input type="password" id="senha_atual" name="senha_atual" required>
            
            <label for="senha_nova">Nova Senha (opcional):</label>
            <input type="password" id="senha_nova" name="senha_nova">
            
            <label for="foto">Foto (opcional):</label>
            <input type="file" id="foto" name="foto">
            
            <input type="submit" value="Atualizar Perfil">
        </form>
    </div>

    <script>
        // Preview da imagem antes do upload
        document.getElementById('foto').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.profile-pic').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
</body>
</html>