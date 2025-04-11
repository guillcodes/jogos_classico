<?php
session_start();

// Lista dos jogos fixos com mais informações
$jogos_fixos = [
    [
        'titulo' => 'Super Mario Bros',
        'descricao' => 'Clássico da Nintendo que revolucionou os jogos de plataforma.',
        'imagem' => 'https://upload.wikimedia.org/wikipedia/en/0/03/Super_Mario_Bros._box.png',
        'genero' => 'Plataforma',
        'ano' => 1985,
        'origem' => 'Nintendo (Japão)'
    ],
    [
        'titulo' => 'Sonic the Hedgehog',
        'descricao' => 'O ouriço azul mais rápido dos games, sucesso no Mega Drive.',
        'imagem' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj3rNCFw_XyohXV7eHR5iTSzizAC9ylGQVRPqpIiKoxpFc8HBG9JP65PKaY39_ZdFL9EIFZmankYigz7VwZVTg7WEgDLoyTbWWZVfZgc-x4SfrplZFIK0eMs3v86mNDVI1I8l7RyHnfW30/s1600/SONIC.jpg',
        'genero' => 'Plataforma',
        'ano' => 1991,
        'origem' => 'SEGA (Japão)'
    ],
    [
        'titulo' => 'The Legend of Zelda',
        'descricao' => 'Aventura épica com exploração, ação e quebra-cabeças.',
        'imagem' => 'https://nintendoboy.com.br/wp-content/uploads/2021/02/zelda-dos-primordios-1.jpg',
        'genero' => 'Aventura',
        'ano' => 1986,
        'origem' => 'Nintendo (Japão)'
    ],
    [
        'titulo' => 'Street Fighter II',
        'descricao' => 'Clássico jogo de luta que marcou os fliperamas dos anos 90.',
        'imagem' => 'https://sm.ign.com/t/ign_br/cover/s/street-fig/street-fighter-ii_nfdm.300.jpg',
        'genero' => 'Luta',
        'ano' => 1991,
        'origem' => 'Capcom (Japão)'
    ],
    [
        'titulo' => 'Pac-Man',
        'descricao' => 'Um dos primeiros sucessos dos videogames com um personagem icônico.',
        'imagem' => 'https://imgsapp2.correiobraziliense.com.br/app/noticia_127983242361/2015/05/22/484057/20150521194740639550u.jpg',
        'genero' => 'Arcade',
        'ano' => 1980,
        'origem' => 'Namco (Japão)'
    ]
];

// Jogos adicionados pelo usuário
$jogos_usuario = $_SESSION['jogos'] ?? [];

// Junta os jogos
$jogos = array_merge($jogos_fixos, $jogos_usuario);

// Obtém o título da URL
$titulo = $_GET['titulo'] ?? '';
$jogo_encontrado = null;

// Procura o jogo pelo título
foreach ($jogos as $jogo) {
    if ($jogo['titulo'] === $titulo) {
        $jogo_encontrado = $jogo;
        break;
    }
}

include 'includes/header.php';
?>

<div class="container mt-5">
    <?php if ($jogo_encontrado): ?>
        <div class="card mb-4">
            <img src="<?= htmlspecialchars($jogo_encontrado['imagem']) ?>" class="card-img-top" alt="Imagem do jogo" style="max-height: 500px; object-fit: contain;">
            <div class="card-body">
                <h3 class="card-title"><?= htmlspecialchars($jogo_encontrado['titulo']) ?></h3>
                <p class="card-text"><?= htmlspecialchars($jogo_encontrado['descricao']) ?></p>
                <p><strong>Gênero:</strong> <?= htmlspecialchars($jogo_encontrado['genero']) ?></p>
                <?php if (isset($jogo_encontrado['ano'])): ?>
                    <p><strong>Ano de Lançamento:</strong> <?= $jogo_encontrado['ano'] ?></p>
                <?php endif; ?>
                <?php if (isset($jogo_encontrado['origem'])): ?>
                    <p><strong>Origem:</strong> <?= htmlspecialchars($jogo_encontrado['origem']) ?></p>
                <?php endif; ?>
                <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Catálogo</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            Jogo não encontrado.
        </div>
        <a href="index.php" class="btn btn-secondary">Voltar ao Catálogo</a>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
