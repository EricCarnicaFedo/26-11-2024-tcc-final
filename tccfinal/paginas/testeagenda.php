<?php

require_once 'ClasseConsultaTutores.php'; // Caminho correto para a classe
require_once 'conexaobd.php'; // Inclua o arquivo de conexão com o banco (conexaobd.php)

// Crie a conexão PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tccdois', 'root', ''); // Altere para os dados corretos do seu banco
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

// Crie uma instância da classe ClasseConsultaTutores, passando o objeto $pdo para o construtor
$consultaTutores = new ClasseConsultaTutores($pdo);

// Obtém as consultas do banco de dados
$consultas = $consultaTutores->consultar();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
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
                            <i class="fas fa-edit"></i>a
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
