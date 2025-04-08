
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="estilo.css">
<div class='container'>
    <h1>Catálogo de Jogos Clássicos</h1>
    <div class='row'>
        <?php
        $jogos = [
            ['nome' => 'Super Mario Bros', 'descricao' => 'Clássico da Nintendo com o encanador Mario.', 'imagem' => 'img/mario.jpg'],
            ['nome' => 'Sonic the Hedgehog', 'descricao' => 'O ouriço azul veloz da SEGA.', 'imagem' => 'img/sonic.jpg'],
            ['nome' => 'Pac-Man', 'descricao' => 'Coma todos os pontinhos e fuja dos fantasmas!', 'imagem' => 'img/pacman.jpg'],
            ['nome' => 'Street Fighter II', 'descricao' => 'Lute com os maiores guerreiros do mundo.', 'imagem' => 'img/streetfighter.jpg'],
            ['nome' => 'The Legend of Zelda', 'descricao' => 'Explore masmorras e salve a princesa Zelda.', 'imagem' => 'img/zelda.jpg']
        ];
        foreach ($jogos as $jogo) {
            echo "<div class='col-md-4'><div class='card'>
                    <img src='{$jogo['imagem']}' class='card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$jogo['nome']}</h5>
                        <p class='card-text'>{$jogo['descricao']}</p>
                    </div>
                </div></div>";
        }
        ?>
    </div>
</div>
<?php include('includes/footer.php'); ?>
