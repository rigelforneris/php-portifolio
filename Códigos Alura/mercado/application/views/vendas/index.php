<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url("css/bootstrap.css") ?> "
    </head>
    <body>
        <div class="container">
            <table class="table">         
                <?php foreach($produtosVendidos as $produto) : ?>
                <tr>
                    <td><?php echo $produto["nome"] ?></td>
                    <td><?php echo dataMysqlParaPtBr($produto["data_de_entrega"]) ?></td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
</body>
</html>

