<?php
/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 3:07 PM
 */

require_once "Conexao.php";
require_once "ConexaoDsn.php";
require_once "Produto.php";
require_once "Fornecedor.php";

$conexao = new Conexao("localhost", "diservice", "root", "");
$conexaoDsn = new ConexaoDsn("mysql:server=localhost;dbname=diservice", "root", "");

$produto = new Produto($conexaoDsn);
$fornecedor = new Fornecedor($conexaoDsn);


// REQUESTS
if(isset($_POST['enviar-fornecedor'])){
    $fornecedor->setNome($_POST['nome']);
    $fornecedor->setEmail($_POST['email']);
    // alterar
    if(isset($_POST['id'])){
        $fornecedor->setId($_POST['id']);
        $fornecedor->alterar();
    }else{
        $fornecedor->inserir();
    }
}
if(isset($_POST['enviar-produto'])){
    $produto->setNome($_POST['nome']);
    $produto->setUnidade($_POST['unidade']);
    $produto->setFornecedorId($_POST['fornecedorId']);
    // alterar
    if(isset($_POST['id'])){
        $produto->setId($_POST['id']);
        $produto->alterar();
    }else{
        $produto->inserir();
    }
}


// FORNECEDOR
if(isset($_GET['c']) && $_GET['c'] == 'fornecedor'){
    // LISTAR
    if(isset($_GET['t']) && $_GET['t'] == 'listar'){
        $fornecedores = $fornecedor->listar();
        include_once "listar-fornecedor.php";
    }else {
        // inserir
        if (isset($_GET['t']) && $_GET['t'] == 'inserir') {
            include_once "formulario-fornecedor.php";
        } else {
            // alterar
            if (isset($_GET['t']) && $_GET['t'] == 'alterar') {
                // ID
                if (isset($_GET['i'])) {
                    $id = $_GET['i'];
                    $fornecedor->setId($id);
                    $fornecedor->get();
                    include_once "formulario-fornecedor.php";
                }
            } else {
                // EXCLUIR
                if(isset($_GET['t']) && $_GET['t'] == 'excluir'){
                    if (isset($_GET['i'])) {
                        $id = $_GET['i'];
                        $fornecedor->setId($id);
                        $fornecedor->excluir();
                        $fornecedores = $fornecedor->listar();
                    }
                    include_once "listar-fornecedor.php";
                }
            }
        }
    }
}


// PRODUTOS
if(isset($_GET['c']) && $_GET['c'] == 'produto'){
    // LISTAR
    if(isset($_GET['t']) && $_GET['t'] == 'listar'){
        $produtos = $produto->listar();
        include_once "listar-produto.php";
    }else {
        // inserir
        if (isset($_GET['t']) && $_GET['t'] == 'inserir') {
            $fornecedores = $fornecedor->listar();
            include_once "formulario-produto.php";
        } else {
            // alterar
            if (isset($_GET['t']) && $_GET['t'] == 'alterar') {
                // ID
                if (isset($_GET['i'])) {
                    $id = $_GET['i'];
                    $produto->setId($id);
                    $produto->get();
                    $fornecedores = $fornecedor->listar();

                    include_once "formulario-produto.php";
                }
            } else {
                // EXCLUIR
                if(isset($_GET['t']) && $_GET['t'] == 'excluir'){
                    if (isset($_GET['i'])) {
                        $id = $_GET['i'];
                        $produto->setId($id);
                        $produto->excluir();
                        $produtos = $produto->listar();
                    }
                    include_once "listar-produto.php";
                }
            }
        }
    }
}

?>

<br>
<a href="/?c=produto&t=inserir">Inserir Produto</a>
<a href="/?c=fornecedor&t=inserir">Inserir Fornecedor</a>



