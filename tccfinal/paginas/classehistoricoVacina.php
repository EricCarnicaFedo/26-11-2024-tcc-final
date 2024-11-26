<?php
class HistoricoVacina {
    private $conn;

    public function __construct() {
        // Conectar ao banco de dados (supondo que você tenha uma função de conexão)
        $this->conn = new PDO("mysql:host=localhost;dbname=tccdois", "root", ""); // Substitua pelas suas credenciais
    }

    public function listar() {
        // Consulta para obter os dados necessários
        $sql = "SELECT hv.idHistorico, a.nome AS nomeAnimal, v.nome AS nomeVacina, 
                       hv.dataAplicacao, hv.idVeterinario
                FROM historico_vacinas hv
                JOIN pacientes a ON hv.idAnimal = a.idPaciente
                JOIN vacinas v ON hv.idVacina = v.id
                JOIN veterinarios vt ON hv.idVeterinario = vt.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
