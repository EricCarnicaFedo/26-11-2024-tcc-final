<?php
class ClasseConsultaTutores {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;  // Aqui você deve garantir que o PDO está sendo passado corretamente
    }

    public function consultar() {
        try {
            // Modifique a consulta para retornar todos os registros
            $sql = "SELECT * FROM consultas_tutores";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retorna os resultados da consulta
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao consultar registros: " . $e->getMessage();
            return [];
        }
    }
}


?>
