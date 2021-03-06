<?php

session_start();
require_once '../class/EventoDAO.php';

$evento = new Evento();
$eventoDAO = new EventoDAO();

$evento->setNome($_POST["nome"]);
$evento->setData($_POST["data"]);
$evento->setHora($_POST["hora"]);
$evento->setCEP($_POST["cep"]);
$evento->setCidade($_POST["cidade"]);
$evento->setBairro($_POST["bairro"]);
$evento->setRua($_POST["rua"]);
$evento->setEstado($_POST["estado"]);
$evento->setNumero($_POST["num"]);
$evento->setComplemento($_POST["comp"]);
$evento->setIdPais($_POST["pais"]);
$evento->setIdUsuCriador($_SESSION["codigo"]);

if(isset($_POST["cd"]))
{
    $evento->setIdEvento($_POST["cd"]);
}else
{
     $evento->setIdEvento(0);
}

if ($eventoDAO->salvar($evento)) 
{
       echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=eventos';</script>";
} else 
{
    echo "<script>alert('Erro ao salvar.'); location.href='../pages/menu.php?pagina=eventos';</script>";
}
?>