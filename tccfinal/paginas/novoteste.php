<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar e Sidebar Elegantes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS será adicionado aqui */
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f6;
        color: #333;
    }

    #navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        transition: transform 0.3s ease-in-out;
    }

    .nav-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .nav-content h1 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    #username {
        font-weight: 500;
    }

    .profile-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    #sidebar-toggle, #sidebar-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #2c3e50;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    #sidebar-toggle:hover, #sidebar-close:hover {
        color: #3498db;
    }

    #sidebar {
        position: fixed;
        top: 0;
        right: -300px;
        width: 300px;
        height: 100vh;
        background-color: #80ab99;
        padding: 2rem;
        transition: right 0.3s ease-in-out;
        z-index: 1001;
    }

    #sidebar.open {
        right: 0;
    }

    #sidebar-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        color: #ecf0f1;
    }

    #sidebar ul {
        list-style-type: none;
        padding: 0;
        margin-top: 3rem;
    }

    #sidebar ul li {
        margin-bottom: 1rem;
    }

    #sidebar ul li a {
        color: #ecf0f1;
        text-decoration: none;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        transition: color 0.3s ease;
    }

    #sidebar ul li a:hover {
        color: #38d1a3;
    }

    #sidebar ul li a i {
        margin-right: 0.5rem;
        width: 20px;
    }

    main {
        padding: 6rem 2rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    main h2 {
        margin-bottom: 1rem;
        color: #2c3e50;
    }

    @media (max-width: 768px) {
        .nav-content {
            padding: 1rem;
        }

        #username {
            display: none;
        }
    }


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
    <nav id="navbar">
        <div class="nav-content">
            <h1>Meu Site</h1>
            <div class="user-info">
                <span id="username">João Silva</span>
                <img src="https://i.pravatar.cc/150?img=3" alt="Foto de perfil" class="profile-pic">
                <button id="sidebar-toggle" aria-label="Abrir menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <div id="sidebar">
        <button id="sidebar-close" aria-label="Fechar menu">
            <i class="fas fa-times"></i>
        </button>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Início</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Perfil</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Configurações</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </div>

    <main>
        <h2>Conteúdo Principal</h2>
   
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
    </main>

    <script>
        // JavaScript será adicionado aqui



        
    const navbar = document.getElementById('navbar');
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebarClose = document.getElementById('sidebar-close');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.add('open');
        navbar.style.transform = 'translateY(-100%)';
    });

    sidebarClose.addEventListener('click', () => {
        sidebar.classList.remove('open');
        navbar.style.transform = 'translateY(0)';
    });

    // Fechar a sidebar se clicar fora dela
    document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
            sidebar.classList.remove('open');
            navbar.style.transform = 'translateY(0)';
        }
    });

    </script>

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