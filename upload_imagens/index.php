<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Formulario de Cadastro</title>
</head>
<body>
    <section>
        <a href="produto.php" class = "sombra"> Ver todos os produtos</a>
    </section>
        <form action="" method = "post" enctype =  "multipart-data">
            <h1>ENVIO DE IMAGENS</h1>

            <label for="nome">Nome do Produto</label>
            <input type="text" name="nome" class="sombra">

            <label for="des">Descrição</label>
            <textarea name="desc" class="sombra"></textarea>

            <input type="file" name = "foto[]" multiple class = "sombra meuInput">
            <input type="submit" id = "botao">
        </form>
    </section>
</body>
</html>