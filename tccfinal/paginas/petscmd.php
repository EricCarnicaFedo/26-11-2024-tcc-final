<?php
require_once 'conexaobd.php';

class Pet {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Listar pets por tutor e clínica
    public function listarPetsPorTutorEClinica($tutor_id, $clinica_id) {
        $sql = "SELECT * FROM pets WHERE tutor_id = :tutor_id AND clinica_id = :clinica_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':tutor_id', $tutor_id);
        $stmt->bindParam(':clinica_id', $clinica_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Adicionar pet para um tutor específico em uma clínica
    public function adicionarPet($tutor_id, $clinica_id, $nome, $especie, $raca, $idade) {
        $sql = "INSERT INTO pets (tutor_id, clinica_id, nome, especie, raca, idade) VALUES (:tutor_id, :clinica_id, :nome, :especie, :raca, :idade)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':tutor_id', $tutor_id);
        $stmt->bindParam(':clinica_id', $clinica_id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':especie', $especie);
        $stmt->bindParam(':raca', $raca);
        $stmt->bindParam(':idade', $idade);
        return $stmt->execute();
    }
}
?>
