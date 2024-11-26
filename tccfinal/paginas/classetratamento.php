<?php
class Tratamento
{
    private $idTratamento;
    private $idPaciente; // Adicionado para armazenar o ID do paciente
    private $descricao;
    private $dataInicio;
    private $dataFim;
    private $status;

    // Métodos setters
    public function setIdTratamento($valor) {
        $this->idTratamento = $valor;
    }

    public function setIdPaciente($valor) { // Método setter para o ID do paciente
        $this->idPaciente = $valor;
    }

    public function setDescricao($valor) {
        $this->descricao = $valor;
    }

    public function setDataInicio($valor) {
        $this->dataInicio = $valor;
    }

    public function setDataFim($valor) {
        $this->dataFim = $valor;
    }

    public function setStatus($valor) {
        $this->status = $valor;
    }

    // Métodos getters
    public function getIdTratamento() {
        return $this->idTratamento;
    }

    public function getIdPaciente() { // Método getter para o ID do paciente
        return $this->idPaciente;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function getStatus() {
        return $this->status;
    }

    // Listar todos os tratamentos
    public function listar() {
        require("conexaobd.php");

        try {
            $consulta = "SELECT * FROM tratamentos";
            $resultado = $pdo->prepare($consulta);
            $resultado->execute();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar tratamentos: " . $e->getMessage();
            return false;
        }
    }

    // Consultar um tratamento específico
    public function consultar($idTratamento) {
        require("conexaobd.php");

        $comando = "SELECT * FROM tratamentos WHERE idTratamento = :idTratamento";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(":idTratamento", $idTratamento);
        $resultado->execute();

        if ($resultado->rowCount() == 1) {
            $registro = $resultado->fetch(PDO::FETCH_ASSOC);
            $this->idTratamento = $registro["idTratamento"];
            $this->idPaciente = $registro["idPaciente"]; // Atualizado
            $this->descricao = $registro["descricao"];
            $this->dataInicio = $registro["data_inicio"]; // Atualizado para corresponder ao nome da coluna
            $this->dataFim = $registro["data_fim"]; // Atualizado para corresponder ao nome da coluna
            $this->status = $registro["status"];
            return true;
        }
        return false;
    }

    // Inserir um novo tratamento
    public function inserir($idPaciente, $descricao, $dataInicio, $dataFim, $status) {
        require("conexaobd.php");

        try {
            $comando = "INSERT INTO tratamentos (idPaciente, descricao, data_inicio, data_fim, status) 
                        VALUES (:idPaciente, :descricao, :dataInicio, :dataFim, :status)";
            $resultado = $pdo->prepare($comando);
            $resultado->bindParam(':idPaciente', $idPaciente); // Atualizado
            $resultado->bindParam(':descricao', $descricao);
            $resultado->bindParam(':dataInicio', $dataInicio);
            $resultado->bindParam(':dataFim', $dataFim);
            $resultado->bindParam(':status', $status);
            $resultado->execute();

            return ($resultado->rowCount() == 1);
        } catch (PDOException $e) {
            echo "Erro ao inserir tratamento: " . $e->getMessage();
            return false;
        }
    }

    // Alterar um tratamento existente
    public function alterar($idTratamento, $idPaciente, $descricao, $dataInicio, $dataFim, $status) {
        require("conexaobd.php");

        $comando = "UPDATE tratamentos 
                    SET idPaciente = :idPaciente, descricao = :descricao, 
                        data_inicio = :dataInicio, data_fim = :dataFim, status = :status 
                    WHERE idTratamento = :idTratamento";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idTratamento', $idTratamento);
        $resultado->bindParam(':idPaciente', $idPaciente); // Atualizado
        $resultado->bindParam(':descricao', $descricao);
        $resultado->bindParam(':dataInicio', $dataInicio);
        $resultado->bindParam(':dataFim', $dataFim);
        $resultado->bindParam(':status', $status);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }

    // Excluir um tratamento
    public function excluir($idTratamento) {
        require("conexaobd.php");

        $comando = "DELETE FROM tratamentos WHERE idTratamento = :idTratamento";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idTratamento', $idTratamento);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }
}
