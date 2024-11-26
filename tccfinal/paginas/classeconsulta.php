<?php
class Consulta
{
    private $idConsulta;
    private $nomeAnimal;
    private $raca;
    private $proprietario; // Proprietário agora é uma string (varchar)
    private $dataConsulta;
    private $horaConsulta;
    private $descricao; // Adicionado campo descricao
    private $status;

    // Métodos setters
    public function setIdConsulta($valor) {
        $this->idConsulta = $valor;
    }

    public function setNomeAnimal($valor) {
        $this->nomeAnimal = $valor;
    }

    public function setRaca($valor) {
        $this->raca = $valor;
    }

    public function setProprietario($valor) {
        $this->proprietario = $valor; // Armazena o nome ou identificação do proprietário
    }

    public function setDataConsulta($valor) {
        $this->dataConsulta = $valor;
    }

    public function setHoraConsulta($valor) {
        $this->horaConsulta = $valor;
    }

    public function setDescricao($valor) { // Adicionado setter para descricao
        $this->descricao = $valor;
    }

    public function setStatus($valor) {
        $this->status = $valor;
    }

    // Métodos getters
    public function getIdConsulta() {
        return $this->idConsulta;
    }

    public function getNomeAnimal() {
        return $this->nomeAnimal;
    }

    public function getRaca() {
        return $this->raca;
    }

    public function getProprietario() {
        return $this->proprietario; // Retorna o nome ou identificação do proprietário
    }

    public function getDataConsulta() {
        return $this->dataConsulta;
    }

    public function getHoraConsulta() {
        return $this->horaConsulta;
    }

    public function getDescricao() { // Adicionado getter para descricao
        return $this->descricao;
    }

    public function getStatus() {
        return $this->status;
    }

    // Listar todas as consultas para uma clínica
    public function listar($clinica_id) {
        require("conexaobd.php");

        // Consultar as consultas para a clínica especificada
        $consulta = "
            SELECT c.*, t.nome AS proprietario_nome 
            FROM consultas_marcadas c
            JOIN tutores t ON c.proprietario = t.nome  -- A associação com o nome do proprietário
            WHERE t.clinica_id = :clinica_id
            ORDER BY c.data_consulta, c.hora_consulta;
        ";

        try {
            $resultado = $pdo->prepare($consulta);
            $resultado->bindParam(':clinica_id', $clinica_id, PDO::PARAM_INT);
            $resultado->execute();

            // Verificar se há registros
            if ($resultado->rowCount() > 0) {
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Nenhuma consulta encontrada.";
                return [];
            }
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return [];
        }
    }

    // Consultar uma consulta específica
    public function consultar($idConsulta) {
        require("conexaobd.php");

        $comando = "SELECT * FROM consultas_marcadas WHERE idConsulta = :idConsulta";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(":idConsulta", $idConsulta);
        $resultado->execute();

        if ($resultado->rowCount() == 1) {
            $registro = $resultado->fetch(PDO::FETCH_ASSOC);
            $this->idConsulta = $registro["idConsulta"];
            $this->nomeAnimal = $registro["nome_animal"];
            $this->raca = $registro["raca"];
            $this->proprietario = $registro["proprietario"]; // Agora armazena o nome do proprietário
            $this->dataConsulta = $registro["data_consulta"];
            $this->horaConsulta = $registro["hora_consulta"];
            $this->descricao = $registro["descricao"]; // Agora captura a descrição
            $this->status = $registro["status"];
            return true;
        }
        return false;
    }

    // Inserir uma nova consulta
    public function inserir($nomeAnimal, $raca, $proprietario, $dataConsulta, $horaConsulta, $descricao, $status) {
        require("conexaobd.php");

        $comando = "INSERT INTO consultas_marcadas (nome_animal, raca, proprietario, data_consulta, hora_consulta, descricao, status) 
                    VALUES (:nomeAnimal, :raca, :proprietario, :dataConsulta, :horaConsulta, :descricao, :status)";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':nomeAnimal', $nomeAnimal);
        $resultado->bindParam(':raca', $raca);
        $resultado->bindParam(':proprietario', $proprietario); // Nome ou identificação do proprietário
        $resultado->bindParam(':dataConsulta', $dataConsulta);
        $resultado->bindParam(':horaConsulta', $horaConsulta);
        $resultado->bindParam(':descricao', $descricao); // Adicionado campo descricao
        $resultado->bindParam(':status', $status);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }

    // Alterar uma consulta
    public function alterar($idConsulta, $nomeAnimal, $raca, $proprietario, $dataConsulta, $horaConsulta, $descricao, $status) {
        require("conexaobd.php");

        $comando = "UPDATE consultas_marcadas 
                    SET nome_animal = :nomeAnimal, raca = :raca, proprietario = :proprietario, 
                        data_consulta = :dataConsulta, hora_consulta = :horaConsulta, descricao = :descricao, status = :status 
                    WHERE idConsulta = :idConsulta";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idConsulta', $idConsulta);
        $resultado->bindParam(':nomeAnimal', $nomeAnimal);
        $resultado->bindParam(':raca', $raca);
        $resultado->bindParam(':proprietario', $proprietario); // Nome ou identificação do proprietário
        $resultado->bindParam(':dataConsulta', $dataConsulta);
        $resultado->bindParam(':horaConsulta', $horaConsulta);
        $resultado->bindParam(':descricao', $descricao); // Adicionado campo descricao
        $resultado->bindParam(':status', $status);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }

    // Excluir uma consulta
    public function excluir($idConsulta) {
        require("conexaobd.php");

        $comando = "DELETE FROM consultas_marcadas WHERE idConsulta = :idConsulta";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idConsulta', $idConsulta);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }
}
?>
