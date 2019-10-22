<?php
session_start();
if(!isset($_SESSION['instituicao'])){
    header('Location:index.php');
    exit();
}
else{
    include 'connection.php';
    $conn = conexao();

    if(!isset($_POST['visibilidade'])){
        $update = 'update evento set visibilidade_evento = 0 where cod_evento = ?';
        $res = $conn->prepare($update);
        $res->bindValue(1, $_GET['id_eve']);
        $res->execute();
        header('Location:painel_inst.php');
        exit();
        }
    elseif($_POST['visibilidade']=='on'){
        $update = 'update evento set visibilidade_evento = 1 where cod_evento = ?';
        $res = $conn->prepare($update);
        $res->bindValue(1, $_GET['id_eve']);
        $res->execute();
        header('Location:painel_inst.php');
        exit();
    }
}

?>