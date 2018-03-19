 <tr>
            <td>Nome</td>
            <td><input type="text" class="form-control" name ="nome" value="<?php echo $produto['nome']?>"></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input type="number" class="form-control" name ="preco" value="<?php echo $produto['preco']?>" ></td>
        </tr>       
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" name="descricao"><?php echo $produto['descricao']?></textarea>
        </tr>

        <tr>
            <td><input type="checkbox" name="usado" <?php echo $usado ?> value="true">Usado</></td>
        </tr>
        
        <td>categoria</td>
        <td>
            <select name="categoria_id" class="form-control">
                <?php foreach ($categorias as $categoria) : 
                    
                    $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                    $selecao = $essaEhACategoria ? "selected='selected'" : "";
                    ?>
                    <option value="<?php echo $categoria['id'] ?>"<?php echo $selecao ?> >
                        <?php echo $categoria['nome'] ?>
                    </option>                   
                <?php endforeach ?>
            </select>

        </td>