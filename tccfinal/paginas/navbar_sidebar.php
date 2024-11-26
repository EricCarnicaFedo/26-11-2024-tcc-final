<?php
// Conexão com o banco de dados
$host = 'localhost'; 
$dbname = 'tccdois'; 
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

?>

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
        <label for="navbar-color">Escolha a cor da Navbar:</label>
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
    <a href="historico.php"><i class='bx bxs-time'></i> <span class="sidebar-text">Histórico</span></a>
    <a href="logout.php" style="margin-top: 100px;">
        <i class='bx bx-log-out'></i> <span class="sidebar-text">Sair</span>
    </a>
    <a href="#"><i class='bx bx-moon theme-toggle' id="theme-toggle"></i> <span class="sidebar-text tema">Tema</span></a>
</div>
