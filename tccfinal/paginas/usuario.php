<!-- Parte Completa do Código -->
<?php
// Conexão com o banco de dados
$host = 'localhost'; // seu host
$dbname = 'tccdois'; // nome do seu banco de dados
$username = 'root'; // seu usuário do banco de dados
$password = ''; // sua senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

// Definindo a quantidade de registros por página
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Buscar pets
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Consultar pets no banco de dados
$query = "SELECT id, nome, especie, raca, idade FROM pets WHERE nome LIKE :search LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':search', '%' . $search . '%');
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consultar total de pets para a paginação
$totalQuery = "SELECT COUNT(*) FROM pets WHERE nome LIKE :search";
$totalStmt = $pdo->prepare($totalQuery);
$totalStmt->bindValue(':search', '%' . $search . '%');
$totalStmt->execute();
$totalPets = $totalStmt->fetchColumn();
$totalPages = ceil($totalPets / $limit);

// Verifica se foi enviado o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];

    // Atualiza o registro no banco de dados
    $updateQuery = "UPDATE pets SET nome = :nome, especie = :especie, raca = :raca, idade = :idade WHERE id = :id";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindValue(':nome', $nome);
    $updateStmt->bindValue(':especie', $especie);
    $updateStmt->bindValue(':raca', $raca);
    $updateStmt->bindValue(':idade', $idade);
    $updateStmt->bindValue(':id', $id);
    $updateStmt->execute();

    // Redireciona para evitar o envio do formulário novamente
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Verifica se foi enviado o formulário de exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Exclui o registro no banco de dados
    $deleteQuery = "DELETE FROM pets WHERE id = :id";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->bindValue(':id', $id);
    $deleteStmt->execute();

    // Redireciona para evitar o envio do formulário novamente
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Verifica se foi enviado o formulário de adição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];

    // Insere o novo pet no banco de dados
    $insertQuery = "INSERT INTO pets (nome, especie, raca, idade) VALUES (:nome, :especie, :raca, :idade)";
    $insertStmt = $pdo->prepare($insertQuery);
    $insertStmt->bindValue(':nome', $nome);
    $insertStmt->bindValue(':especie', $especie);
    $insertStmt->bindValue(':raca', $raca);
    $insertStmt->bindValue(':idade', $idade);
    $insertStmt->execute();

    // Redireciona para evitar o envio do formulário novamente
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="inicio.css">
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="usuario.css">

  <!-- Fontes -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Título da Página -->
  <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>
<header id="navbar" class="flex justify-between items-center text-white p-4">
    <nav>
        <div class="titulonavbar">
            <i class="bx bxs-animal-paw"></i>
            <span class="text">Configurar Usuario</span>
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
      <i class='bx bx-home-alt' style="font-size: 40px; color: white;"></i>
      <h2>VetEtec</h2>
    </div>
    <a href="javascript:void(0)" class="closebtn" id="close-sidebar"> <i class='bx bxs-chevron-right'></i></a>
   
    
    <a href="<?php echo ($_SESSION['tipo'] == 'veterinario') ? 'veterinario.php' : 'tutor.php'; ?>">
    <i class="bx bx-home"></i><span class="sidebar-text">Início</span>
</a>
    
  <a href="agenda.php"><i class='bx bx-calendar'></i> <span class="sidebar-text">Agenda</span></a>
  <a href="pets.php"><i class='bx bxs-cat'></i> <span class="sidebar-text">Pets</span></a>
  <a href="historico.php"><i class='bx bxs-time'></i> <span class="sidebar-text">Historico</span></a>
  <a href="logout.php" style="margin-top: 100px;">
  <i class='bx bx-log-out'></i> <span class="sidebar-text">Sair</span>
</a>

    <a href="#"><i class='bx bx-moon theme-toggle' id="theme-toggle"></i> <span class="sidebar-text tema">Tema</span></a>
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
    document.getElementById('customize-button').addEventListener('click', function () {
      this.classList.toggle('rotated'); // Adiciona ou remove a classe 'rotated' ao clicar
    });
    document.addEventListener('DOMContentLoaded', function () {
      var conteudo = document.querySelector('.conteudo');
      setTimeout(function () {
        conteudo.classList.add('entrou');
      }, 500); // Ajuste o tempo conforme necessário
    });
    function verNotificacoes() {
      alert("Você clicou na notificação. Aqui você pode redirecionar para uma página de detalhes ou abrir um modal com mais informações.");
    }


  </script>
</body>

</html>
