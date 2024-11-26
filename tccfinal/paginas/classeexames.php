<?php
class Exames
{
    private $idExame;
    private $idPaciente;
    private $tipoExame;
    private $dataExame;
    private $resultado;

    // Métodos setters
    public function setIdExame($valor) {
        $this->idExame = $valor;
    }

    public function setidPaciente($valor) {
        $this->idPaciente = $valor;
    }

    public function setTipoExame($valor) {
        $this->tipoExame = $valor;
    }

    public function setDataExame($valor) {
        $this->dataExame = $valor;
    }

    public function setResultado($valor) {
        $this->resultado = $valor;
    }

    // Métodos getters
    public function getIdExame() {
        return $this->idExame;
    }

    public function getidPaciente() {
        return $this->idPaciente;
    }

    public function getTipoExame() {
        return $this->tipoExame;
    }

    public function getDataExame() {
        return $this->dataExame;
    }

    public function getResultado() {
        return $this->resultado;
    }

    // Listar todos os exames realizados
    public function listar() {
        require("conexaobd.php");

        $consulta = "SELECT * FROM exames_realizados ORDER BY dataExame";
        $resultado = $pdo->prepare($consulta);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    // Consultar um exame específico
    public function consultar($idExame) {
        require("conexaobd.php");

        $comando = "SELECT * FROM exames_realizados WHERE idExame = :idExame";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(":idExame", $idExame);
        $resultado->execute();

        if ($resultado->rowCount() == 1) {
            $registro = $resultado->fetch(PDO::FETCH_ASSOC);
            $this->idExame = $registro["idExame"];
            $this->idPaciente = $registro["idPaciente"];
            $this->tipoExame = $registro["tipoExame"];
            $this->dataExame = $registro["dataExame"];
            $this->resultado = $registro["resultado"];
            return true;
        }
        return false;
    }

    // Inserir um novo exame realizado
    public function inserir($idPaciente, $tipoExame, $dataExame, $resultado) {
        require("conexaobd.php");

        $comando = "INSERT INTO exames_realizados (idPaciente, tipoExame, dataExame, resultado) 
                    VALUES (:idPaciente, :tipoExame, :dataExame, :resultado)";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idPaciente', $idPaciente);
        $resultado->bindParam(':tipoExame', $tipoExame);
        $resultado->bindParam(':dataExame', $dataExame);
        $resultado->bindParam(':resultado', $resultado);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }

    // Alterar um exame realizado existente
    public function alterar($idExame, $idPaciente, $tipoExame, $dataExame, $resultado) {
        require("conexaobd.php");

        $comando = "UPDATE exames_realizados 
                    SET idPaciente = :idPaciente, tipoExame = :tipoExame, 
                        dataExame = :dataExame, resultado = :resultado 
                    WHERE idExame = :idExame";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idExame', $idExame);
        $resultado->bindParam(':idPaciente', $idPaciente);
        $resultado->bindParam(':tipoExame', $tipoExame);
        $resultado->bindParam(':dataExame', $dataExame);
        $resultado->bindParam(':resultado', $resultado);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }

    // Excluir um exame realizado
    public function excluir($idExame) {
        require("conexaobd.php");

        $comando = "DELETE FROM exames_realizados WHERE idExame = :idExame";
        $resultado = $pdo->prepare($comando);
        $resultado->bindParam(':idExame', $idExame);
        $resultado->execute();

        return ($resultado->rowCount() == 1) ? true : false;
    }
}
