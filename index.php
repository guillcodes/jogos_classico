<?php
session_start();

// Jogos fixos com gênero
$jogos_fixos = [
    [
        'titulo' => 'Super Mario Bros',
        'descricao' => 'Clássico da Nintendo que revolucionou os jogos de plataforma.',
        'imagem' => 'https://upload.wikimedia.org/wikipedia/en/0/03/Super_Mario_Bros._box.png',
        'genero' => 'Plataforma'
    ],
    [
        'titulo' => 'Sonic the Hedgehog',
        'descricao' => 'O ouriço azul mais rápido dos games, sucesso no Mega Drive.',
        'imagem' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj3rNCFw_XyohXV7eHR5iTSzizAC9ylGQVRPqpIiKoxpFc8HBG9JP65PKaY39_ZdFL9EIFZmankYigz7VwZVTg7WEgDLoyTbWWZVfZgc-x4SfrplZFIK0eMs3v86mNDVI1I8l7RyHnfW30/s1600/SONIC.jpg',
        'genero' => 'Plataforma'
    ],
    [
        'titulo' => 'The Legend of Zelda',
        'descricao' => 'Aventura épica com exploração, ação e quebra-cabeças.',
        'imagem' => 'https://nintendoboy.com.br/wp-content/uploads/2021/02/zelda-dos-primordios-1.jpg',
        'genero' => 'Aventura'
    ],
    [
        'titulo' => 'Street Fighter II',
        'descricao' => 'Clássico jogo de luta que marcou os fliperamas dos anos 90.',
        'imagem' => 'https://sm.ign.com/t/ign_br/cover/s/street-fig/street-fighter-ii_nfdm.300.jpg',
        'genero' => 'Luta'
    ],
    [
        'titulo' => 'Pac-Man',
        'descricao' => 'Um dos primeiros sucessos dos videogames com um personagem icônico.',
        'imagem' => 'https://imgsapp2.correiobraziliense.com.br/app/noticia_127983242361/2015/05/22/484057/20150521194740639550u.jpg',
        'genero' => 'Arcade'
    ]
];

// Carrega jogos do usuário via sessão
$jogos_usuario = $_SESSION['jogos'] ?? [];

// Filtro de gênero
$genero_filtro = $_GET['genero'] ?? '';

// Junta os jogos
$jogos = array_merge($jogos_fixos, $jogos_usuario);

// Aplica filtro de gênero
if ($genero_filtro) {
    $jogos = array_filter($jogos, function($jogo) use ($genero_filtro) {
        return strcasecmp($jogo['genero'], $genero_filtro) === 0;
    });
}

include 'includes/header.php';
?>

<div class="container mt-4">
    <h2 class="mb-4">🎮 Catálogo de Jogos Clássicos</h2>

    <!-- Campo de busca por gênero -->
    <form method="get" class="mb-4">
        <div class="input-group">
            <input type="text" name="genero" class="form-control" placeholder="Filtrar por gênero (ex: Luta, Aventura)" value="<?= htmlspecialchars($genero_filtro) ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (count($jogos) === 0): ?>
            <p>Nenhum jogo encontrado com o gênero informado.</p>
        <?php endif; ?>

        <?php foreach ($jogos as $jogo): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= htmlspecialchars($jogo['imagem']) ?>" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Imagem do jogo">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($jogo['titulo']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($jogo['descricao']) ?></p>
                        <span class="badge bg-secondary"><?= htmlspecialchars($jogo['genero']) ?></span>
                        <a href="detalhes.php?titulo=<?= urlencode($jogo['titulo']) ?>" class="btn btn-sm btn-outline-primary mt-3">Ver detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
