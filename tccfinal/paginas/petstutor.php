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
<link rel="stylesheet" href="agenda.css">
<link rel="stylesheet" href="editar.css">
  <link rel="stylesheet" href="pets.css">
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="sections.css">

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
            <span class="text">Pets</span>
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

  <main class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex justify-between p-4 border-b">
            <h1 class="text-2xl font-bold">Lista de Pets</h1>
            <form method="GET" action="" class="flex">
                <input type="text" name="search" placeholder="Pesquisar por nome" class="border px-4 py-2 rounded-l-md" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="bg-white-500 text-white px-4 rounded-r-md">
                    <i class='bx bx-search'></i>
                </button>
            </form>
            <button onclick="document.getElementById('addModal').classList.remove('hidden');" class="bg-green-500 text-white px-4 py-2 rounded-md">
                Adicionar Pet
            </button>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">Nome</th>
                    <th class="py-2 px-4 text-left">Espécie</th>
                    <th class="py-2 px-4 text-left">Raça</th>
                    <th class="py-2 px-4 text-left">Idade</th>
                    <th class="py-2 px-4 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pets)): ?>
                    <?php foreach ($pets as $pet): ?>
                        <tr>
                            <td class="py-2 px-4"><?php echo $pet['nome']; ?></td>
                            <td class="py-2 px-4"><?php echo $pet['especie']; ?></td>
                            <td class="py-2 px-4"><?php echo $pet['raca']; ?></td>
                            <td class="py-2 px-4"><?php echo $pet['idade']; ?> anos</td>
                            <td class="py-2 px-4 text-center space-x-2">
                                <a href="#" class="text-blue-500" onclick="openViewModal('<?php echo $pet['nome']; ?>', '<?php echo $pet['especie']; ?>', '<?php echo $pet['raca']; ?>', <?php echo $pet['idade']; ?>)">
                                    <i class='bx bxs-show'></i>
                                </a>
                                <a href="#" class="text-yellow-500" onclick="openModal(<?php echo $pet['id']; ?>, '<?php echo $pet['nome']; ?>', '<?php echo $pet['especie']; ?>', '<?php echo $pet['raca']; ?>', <?php echo $pet['idade']; ?>)">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a href="#" class="text-red-500" onclick="confirmDelete(<?php echo $pet['id']; ?>)">
                                    <i class='bx bxs-trash'></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="py-2 px-4 text-center text-gray-500">Nenhum pet encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="flex justify-center p-4 border-t">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>&search=<?php echo urlencode($search); ?>" class="mx-1 px-2 py-1 rounded-md <?php echo ($i === $page) ? 'bg-blue-500 text-white' : 'bg-gray-200'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Modal Adicionar Pet -->
    <div id="addModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Adicionar Pet</h2>
            <form method="POST" action="">
                <input type="text" name="nome" placeholder="Nome" class="w-full p-2 mb-3 border rounded">
                <input type="text" name="especie" placeholder="Espécie" class="w-full p-2 mb-3 border rounded">
                <input type="text" name="raca" placeholder="Raça" class="w-full p-2 mb-3 border rounded">
                <input type="number" name="idade" placeholder="Idade" class="w-full p-2 mb-3 border rounded">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 rounded-md">Cancelar</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edição -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Editar Pet</h2>
            <form method="POST" action="">
                <input type="hidden" id="editId" name="id">
                <input type="text" id="editNome" name="nome" placeholder="Nome" class="w-full p-2 mb-3 border rounded">
                <input type="text" id="editEspecie" name="especie" placeholder="Espécie" class="w-full p-2 mb-3 border rounded">
                <input type="text" id="editRaca" name="raca" placeholder="Raça" class="w-full p-2 mb-3 border rounded">
                <input type="number" id="editIdade" name="idade" placeholder="Idade" class="w-full p-2 mb-3 border rounded">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 rounded-md">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Visualização -->
    <div id="viewModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Detalhes do Pet</h2>
            <div class="mb-2"><strong>Nome:</strong> <span id="viewNome"></span></div>
            <div class="mb-2"><strong>Espécie:</strong> <span id="viewEspecie"></span></div>
            <div class="mb-2"><strong>Raça:</strong> <span id="viewRaca"></span></div>
            <div class="mb-2"><strong>Idade:</strong> <span id="viewIdade"></span></div>
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 rounded-md">Fechar</button>
            </div>
        </div>
    </div>

    <!-- Formulário de exclusão -->
    <form id="deleteForm" method="POST" action="">
        <input type="hidden" id="deleteId" name="deleteId">
    </form>
</main>
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
        function openModal(id, nome, especie, raca, idade) {
            document.getElementById("editId").value = id;
            document.getElementById("editNome").value = nome;
            document.getElementById("editEspecie").value = especie;
            document.getElementById("editRaca").value = raca;
            document.getElementById("editIdade").value = idade;
            document.getElementById("editModal").classList.remove("hidden");
        }

        function openViewModal(nome, especie, raca, idade) {
            document.getElementById("viewNome").textContent = nome;
            document.getElementById("viewEspecie").textContent = especie;
            document.getElementById("viewRaca").textContent = raca;
            document.getElementById("viewIdade").textContent = idade + " anos";
            document.getElementById("viewModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("editModal").classList.add("hidden");
            document.getElementById("addModal").classList.add("hidden");
            document.getElementById("viewModal").classList.add("hidden");
        }

        function confirmDelete(id) {
            if (confirm("Tem certeza que deseja excluir este pet?")) {
                document.getElementById("deleteId").value = id;
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
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
