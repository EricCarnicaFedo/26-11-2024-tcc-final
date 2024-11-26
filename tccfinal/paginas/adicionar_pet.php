<?php
require_once 'petstutor.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tutor_id = $_POST['tutor_id'];
    $clinica_id = $_POST['clinica_id'];
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];

    $pet = new Pet();
    if ($pet->adicionarPet($tutor_id, $clinica_id, $nome, $especie, $raca, $idade)) {
        echo "Pet adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar o pet.";
    }

    header("Location: listar_pets.php?tutor_id=$tutor_id&clinica_id=$clinica_id");
    exit();
}

