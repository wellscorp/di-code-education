<?php
/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 10:51 PM
 */

?>

<form method="post">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php if($produto->getNome()) echo $produto->getNome() ?>">

    <label>Unidade</label>
    <input type="text" name="unidade" value="<?php if($produto->getUnidade()) echo $produto->getUnidade() ?>">

    <label>Fornecedor</label>
    <select name="fornecedorId" >
        <option>.:Selecione:.</option>
        <?php if(isset($fornecedores)){ ?>
            <?php foreach($fornecedores as $fornecedor){ ?>
                <option value="<?php echo $fornecedor['id'] ?>" <?php if($produto->getFornecedorId()){ if($fornecedor['id'] == $produto->getFornecedorId()) echo 'selected'; } ?>><?php echo $fornecedor['nome'] ?></option>
            <?php } ?>
        <?php } ?>
    </select>

    <?php if(isset($id)){ ?>
        <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php } ?>

    <button type="submit" name="enviar-produto">Enviar</button>
</form>
