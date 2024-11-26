<?php
include('conexaobd.php');

// Inicia a sessão, se ainda não foi iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o tutor está logado
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'tutor') {
    // Redireciona para o login se o tutor não estiver logado
    header("Location: login.php");
    exit();
}

// Obtém o ID do tutor da sessão
$tutor_id = $_SESSION['usuario_id'];

// Verifica se o ID do tutor existe na sessão
if (!$tutor_id) {
    echo "Sessão expirada ou ID do tutor não encontrado.";
    header("refresh:2;url=login.php");  // Redireciona após 2 segundos
    exit();
}

// Definindo a conexão com o banco de dados
try {
    // Aqui você já tem o código do seu `conexaobd.php`, então pode garantir que ele inicialize a variável $conn corretamente
    if (!isset($p)) {
        // Ajuste de conexão, caso não tenha sido definida
        $conn = new PDO('mysql:host=localhost;dbname=tccdois', 'root', ''); // Ajuste conforme suas credenciais
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Consulta no banco de dados para obter as consultas agendadas do tutor
    $sql = "SELECT * FROM consultas_tutores WHERE tutor_id = :tutor_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tutor_id', $tutor_id, PDO::PARAM_INT);

    $stmt->execute();
    $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($consultas) == 0) {
        echo "Nenhuma consulta encontrada.";
    } else {
        foreach ($consultas as $consulta) {
            echo "<p>Consulta: " . $consulta['nome_tutor'] . " - " . $consulta['data_consulta'] . " " . $consulta['hora_consulta'] . "</p>";
        }
    }
} catch (PDOException $e) {
    echo "Erro ao buscar consultas: " . $e->getMessage();
}
?>


<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!----======== CSS ======== -->
  <link rel="stylesheet" href="inicio.css">
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="agenda.css">
<link rel="stylesheet" href="editar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!---------========= fontes =========------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>


<script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
  <!----===== Boxicons CSS ===== -->

  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <!--<title>Dashboard Sidebar Menu</title>-->
</head>


<header id="navbar" class="flex justify-between items-center text-white p-4">
    <nav>
        <div class="titulonavbar">
            <i class="bx bxs-animal-paw"></i>
            <span class="text">Agenda</span>
        </div>
        <ul class="navbarconteudo">
            <!-- Manter apenas os itens desejados -->
        </ul>
    </nav>

    <div class="flex items-center space-x-4">
        <!-- Verifica se o nome do usuário está na sessão -->
        <span class="hidden md:inline-block">Bem-vindo, <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></span>

        <a href="logout.php" class="hover:underline">Sair</a>
        <i class="bx bx-bell"></i>
        <img src="https://placehold.co/30x30" alt="User avatar" class="w-8 h-8 rounded-full">
    </div>

    <i class='bx bx-menu menu-button' id="menu-button" style="font-size: 30px;"></i>
    <i class='bx bx-cog customize-button' id="customize-button" style="font-size: 20px;"></i>
    <div id="color-picker">
        <label for="navbar-color">Choose navbar color:</label>
        <input type="color" id="navbar-color" name="navbar-color" value="#4CAF50">
    </div>
</header>



  <div id="sidebar" class="sidebar">
    <div class="sidebar-header">
      <i class='bx bx-home-alt' style="font-size: 40px; color: white;  "></i>
      <h2>VetEtec</h2>
      <!-- Ícone de exemplo -->
    </div>
    <a href="javascript:void(0)" class="closebtn" id="close-sidebar"> <i class='bx bxs-chevron-right'></i></a>
    
    <a href="<?php echo ($_SESSION['tipo'] == 'veterinario') ? 'veterinario.php' : 'tutor.php'; ?>">
    <i class="bx bx-home"></i><span class="sidebar-text">Início</span>
</a>


    
  <a href="agenda.php"><i class='bx bx-calendar'></i> <span class="sidebar-text">Agenda</span></a>
  <a href="petstutor.php"><i class='bx bxs-cat'></i> <span class="sidebar-text">Pets</span></a>
  <a href="logout.php" style="margin-top: 100px;">
  <i class='bx bx-log-out'></i> <span class="sidebar-text">Sair</span>
</a>
    <a href="#"><i class='bx bx-moon theme-toggle' id="theme-toggle"></i> <span class="sidebar-text  tema   ">Tema</span></a>

  </div>
 

  
<div class="bg-white shadow-md rounded-lg overflow-hidden w-11/12 mx-auto mt-5">
    <!-- Barra superior: Adicionar consulta e Pesquisa -->
    <div class="flex items-center justify-between bg-gray-100 px-4 py-3">
        <button class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded flex items-center gap-2">
            <i class="fas fa-plus"></i>
            Adicionar consulta
        </button>
        <div class="relative">
            <input 
                type="text" 
                placeholder="Buscar consulta por animal" 
                class="text-sm px-4 py-2 w-64 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
        </div>
    </div>

    <!-- Contador de total -->
    <div class="bg-gray-100 px-4 py-2 text-sm text-gray-600">
        Total de consultas: <?php echo count($consultas); ?>
    </div>

    <!-- Tabela -->
    <table class="min-w-full border-collapse">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Código</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Tutor</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Contato</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Dia</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Horário</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Descrição</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 uppercase">Status</th>
                <th class="px-4 py-2 text-center text-sm font-medium text-gray-700 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($consultas)) {
                foreach ($consultas as $registro) {
                    // Define a cor com base no status
                    switch ($registro["status"]) {
                        case 'Agendada':
                            $statusColor = 'bg-yellow-500'; // Amarelo
                            break;
                        case 'Realizada':
                            $statusColor = 'bg-green-500'; // Verde
                            break;
                        case 'Cancelada':
                            $statusColor = 'bg-red-500'; // Vermelho
                            break;
                        default:
                            $statusColor = 'bg-gray-500'; // Cor padrão se o status não for reconhecido
                            break;
                    }
            ?>
            <tr class="border-b">
                <td class="px-4 py-2 text-sm text-gray-600"><?php echo htmlspecialchars($registro["idConsultaTutor"]); ?></td>
                <td class="px-4 py-2 text-sm text-gray-600"><?php echo htmlspecialchars($registro["nome_tutor"]); ?></td>
                <td class="px-4 py-2 text-sm text-gray-600"><?php echo htmlspecialchars($registro["contato_tutor"]); ?></td>
                <td class="px-4 py-2 text-sm text-gray-600"><?php echo htmlspecialchars($registro["data_consulta"]); ?></td>
                <td class="px-4 py-2 text-sm text-gray-600"><?php echo htmlspecialchars($registro["hora_consulta"]); ?></td>
                <td class="px-4 py-2 text-sm text-gray-600"><?php echo htmlspecialchars($registro["descricao"]); ?></td>
                <td class="px-4 py-2 text-sm text-gray-600">
                    <span class="text-white px-2 py-1 rounded <?php echo $statusColor; ?>">
                        <?php echo htmlspecialchars($registro["status"]); ?>
                    </span>
                </td>
                <td class="px-4 py-2 text-center">
                    <div class="flex justify-center gap-2">
                        <button class="bg-green-500 hover:bg-green-600 text-white text-sm px-3 py-1 rounded">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>Nenhuma consulta encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>



    <footer class="footer">
      <div class="footer-content">
        <h2 class="footer-title">Gestão Veterinária</h2>
        <p class="footer-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at sapien eu justo ultrices feugiat at id quam. Vivamus eu tellus vel ex pretium hendrerit. Phasellus eget vehicula ex, sit amet dictum felis.</p>
        <ul class="footer-links">
          <li><a href="#">Início</a></li>
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Serviços</a></li>
          <li><a href="#">Equipe</a></li>
          <li><a href="#">Contato</a></li>
        </ul>
        <div class="social-icons">
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/facebook-new.png" alt="Facebook"></a>
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/twitter.png" alt="Twitter"></a>
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png" alt="LinkedIn"></a>
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="Instagram"></a>
        </div>
        <div class="contact-info">
          <div class="contact-info-item">
            <img src="https://img.icons8.com/material-rounded/24/ffffff/phone--v1.png" alt="Telefone">
            +1 234 567 890
          </div>
          <div class="contact-info-item">
            <img src="https://img.icons8.com/material-rounded/24/ffffff/email-open--v1.png" alt="E-mail">
            exemplo@exemplo.com
          </div>
        </div>
        <div class="subscribe">
          <input type="email" class="subscribe-input" placeholder="Digite seu e-mail">
          <button class="subscribe-button">Assinar</button>
        </div>
        <div class="company-info">
          <h3>Sobre Nós</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at sapien eu justo ultrices feugiat at id quam. Vivamus eu tellus vel ex pretium hendrerit. Phasellus eget vehicula ex, sit amet dictum felis.</p>
        </div>
        <div class="quick-links">
          <h3>Links Rápidos</h3>
          <ul>
            <li><a href="#">Política de Privacidade</a></li>
            <li><a href="#">Termos de Serviço</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Suporte</a></li>
          </ul>
        </div>
        <div class="about-section">
          <h3>Nossa Missão</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at sapien eu justo ultrices feugiat at id quam. Vivamus eu tellus vel ex pretium hendrerit. Phasellus eget vehicula ex, sit amet dictum felis.</p>
        </div>
        <div class="animal-images">
          <img src="https://placeimg.com/100/100/animals" alt="Animal">
          <img src="https://placeimg.com/100/100/animals" alt="Animal">
          <img src="https://placeimg.com/100/100/animals" alt="Animal">
          <img src="https://placeimg.com/100/100/animals" alt="Animal">
        </div>
      </div>
    </footer>
    <script>
     const themeToggle = document.getElementById('theme-toggle');
      const customizeButton = document.getElementById('customize-button');
      const colorPicker = document.getElementById('color-picker');
      const navbar = document.getElementById('navbar');
      const body = document.body;
      const sidebar = document.getElementById('sidebar');
      const menuButton = document.getElementById('menu-button');
      const closeSidebar = document.getElementById('close-sidebar');
      let customNavbarColor = '#afd4c3'; // Cor padrão da barra de navegação e da barra lateral
      themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
        themeToggle.classList.toggle('bx-sun');
        // Restaurar a cor personalizada ao alternar entre temas claro e escuro
        if (body.classList.contains('dark-theme')) {
          navbar.style.backgroundColor = '#121212'; // Cor de fundo padrão do tema escuro
          sidebar.style.backgroundColor = '#121212'; // Cor de fundo padrão do tema escuro para a barra lateral
        } else {
          navbar.style.backgroundColor = customNavbarColor; // Restaurar a cor personalizada da barra de navegação
          sidebar.style.backgroundColor = customNavbarColor; // Restaurar a cor personalizada da barra lateral
        }
      });
      customizeButton.addEventListener('click', () => {
        colorPicker.style.display = colorPicker.style.display === 'block' ? 'none' : 'block';
      });
      document.getElementById('navbar-color').addEventListener('input', (event) => {
        customNavbarColor = event.target.value; // Armazenar a cor personalizada
        navbar.style.backgroundColor = customNavbarColor; // Atualizar a cor da barra de navegação
        sidebar.style.backgroundColor = customNavbarColor; // Atualizar a cor da barra lateral
      });
      menuButton.addEventListener('click', () => {
        sidebar.style.left = '0';
        navbar.style.transform = 'translateY(-100%)';
      });
      closeSidebar.addEventListener('click', () => {
        sidebar.style.left = '-250px';
        navbar.style.transform = 'translateY(0)';
      });
    document.getElementById('customize-button').addEventListener('click', function() {
      this.classList.toggle('rotated'); // Adiciona ou remove a classe 'rotated' ao clicar
  });
   document.addEventListener('DOMContentLoaded', function() {
      var conteudo = document.querySelector('.conteudo');
      setTimeout(function() {
        conteudo.classList.add('entrou');
      }, 500); // Ajuste o tempo conforme necessário
    });

// Mostrar o popup
document.getElementById('openPopup').addEventListener('click', function () {
        document.getElementById('popupContainer').style.display = 'flex';
    });

    // Fechar o popup
    document.getElementById('closePopup').addEventListener('click', function () {
        document.getElementById('popupContainer').style.display = 'none';
    });
    </script>

    
</body>
</html>