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
    <input type="text" name="nome" value="<?php if($fornecedor->getNome()) echo $fornecedor->getNome() ?>">

    <label>E-mail</label>
    <input type="text" name="email" value="<?php if($fornecedor->getEmail()) echo $fornecedor->getEmail() ?>">

    <?php if(isset($id)){ ?>
        <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php } ?>

    <button type="submit" name="enviar-fornecedor">Enviar</button>
</form>
