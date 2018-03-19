<?php
require_once("cabecalho.php");
require_once("banco-produto.php");

?>

<?php 
mostraAlerta("success");
?>

<table class="table table-striped table-bordered">

    <?php
    $produtos = listaProdutos($conexao);
    foreach ($produtos as $produto) {
        ?>
        <tr>
            <td><?php echo $produto['nome'] ?></td> 
            <td><?php echo $produto['preco'] ?></td> 
            <td><?php echo substr($produto['descricao'], 0, 40) ?>...</td> 
            
            <td><?php echo substr($produto['categoria_nome'], 0, 40) ?></td> 
            <td><a href="produto-altera-formulario.php?id=<?php echo $produto['id'] ?>" class="btn btn-primary">Alterar</a></td>
            <td> 
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id"  value="<?php echo $produto['id'] ?>">
                    <button class="btn btn-danger">Remover</button>                  
                </form>                
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<?php include("rodape.php"); ?>
