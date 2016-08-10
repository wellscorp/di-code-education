<?php
/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 10:44 PM
 */

?>
<table>
    <tr>
        <td>Nome</td>
        <td>E-mail</td>
        <td>Acao</td>
    </tr>
    <?php if(isset($fornecedores)){ ?>
        <?php foreach($fornecedores as $fornecedor){ ?>
            <tr>
                <td><?php echo $fornecedor['nome'] ?></td>
                <td><?php echo $fornecedor['email'] ?></td>
                <td><a href="/?c=fornecedor&t=excluir&i=<?php echo $fornecedor['id'] ?>">Excluir</a></td>
            </tr>
        <?php } ?>
    <?php } ?>

</table>