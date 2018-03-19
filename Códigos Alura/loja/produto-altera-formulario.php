<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("banco-produto.php");

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listacategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";

?>
<h1>Edição de produto</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?php echo $produto['id']?>">
    
    <table class="table">
       <?php include("produto-formulario-base.php")?>

        <tr>
            <td>
                <button class="btn btn-primary" type="submit" >Alterar</button>
            </td>
        </tr>
    </table>
</form>
<?php include("rodape.php"); ?>