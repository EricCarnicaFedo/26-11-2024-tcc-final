<?php
// Incluir o arquivo de classe Consulta
include("classeconsulta.php");

// Criar uma instância da classe Consulta
$consulta = new Consulta();

// Supondo que o ID da clínica seja 1 (pode ser obtido de uma variável ou sessão)
$clinica_id = 7;

// Listar todas as consultas
$consultas = $consulta->listar($clinica_id);

// Verifique se a consulta retornou dados
if (empty($consultas)) {
    echo "Nenhuma consulta encontrada para a clínica com ID: " . $clinica_id;
} else {
    // Exibir os dados em uma tabela
    echo '<table border="1" cellpadding="10" cellspacing="0">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nome do Animal</th>';
    echo '<th>Raça</th>';
    echo '<th>Proprietário</th>';
    echo '<th>Data da Consulta</th>';
    echo '<th>Hora da Consulta</th>';
    echo '<th>Descrição</th>';
    echo '<th>Status</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Preencher a tabela com os dados
    foreach ($consultas as $consulta) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($consulta['idConsulta']) . '</td>';
        echo '<td>' . htmlspecialchars($consulta['nome_animal']) . '</td>';
        echo '<td>' . htmlspecialchars($consulta['raca']) . '</td>';
        echo '<td>' . htmlspecialchars($consulta['proprietario_nome']) . '</td>';
        echo '<td>' . htmlspecialchars($consulta['data_consulta']) . '</td>';
        echo '<td>' . htmlspecialchars($consulta['hora_consulta']) . '</td>';
        echo '<td>' . htmlspecialchars($consulta['descricao']) . '</td>';
        
        // Status com cores diferentes
        $statusColor = '';
        switch ($consulta['status']) {
            case 'Agendada':
                $statusColor = 'style="background-color: yellow;"';
                break;
            case 'Realizada':
                $statusColor = 'style="background-color: green; color: white;"';
                break;
            case 'Cancelada':
                $statusColor = 'style="background-color: red; color: white;"';
                break;
            default:
                $statusColor = 'style="background-color: gray; color: white;"';
                break;
        }
        echo '<td ' . $statusColor . '>' . htmlspecialchars($consulta['status']) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
