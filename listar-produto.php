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
        <td>Unidade</td>
        <td>Fornecedor</td>
        <td>Acao</td>
    </tr>
    <?php if(isset($produtos)){ ?>
        <?php foreach($produtos as $produto){ ?>
            <tr>
                <td><?php echo $produto['nome'] ?></td>
                <td><?php echo $produto['unidade'] ?></td>
                <td><?php echo $produto['fornecedor_nome'] ?></td>
                <td>
                    <a href="/?c=produto&t=alterar&i=<?php echo $produto['id'] ?>">Alterar</a>
                    <a href="/?c=produto&t=excluir&i=<?php echo $produto['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>

</table>