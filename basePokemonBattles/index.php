<?php
/**
 * TAREFA 4 - INTERFACE INTERATIVA (BOILERPLATE)
 * Este ficheiro gere a interação web e a lógica de sessão.
 * Não precisa de alterar este código, foque-se na implementação das classes POO.
 */
require_once 'Pokemon.php';
require_once 'PokemonFogo.php';
require_once 'PokemonAgua.php';
require_once 'PokemonPlanta.php';
require_once 'Arena.php';

session_start();

if (isset($_GET['reset'])) { session_destroy(); header("Location: index.php"); exit(); }

if (isset($_POST['selecionar'])) {
    $nome = $_POST['nome'] ?: "Pokemon " . rand(1, 100);
    $tipo = $_POST['tipo'];
    $hp = (int)$_POST['hp'];
    $pokemon = null;
    switch ($tipo) {
        case 'Fogo': $pokemon = new PokemonFogo($nome, $hp); break;
        case 'Agua': $pokemon = new PokemonAgua($nome, $hp); break;
        case 'Planta': $pokemon = new PokemonPlanta($nome, $hp); break;
    }
    if (!isset($_SESSION['p1'])) { $_SESSION['p1'] = $pokemon; } 
    else { $_SESSION['p2'] = $pokemon; $_SESSION['arena'] = new Arena($_SESSION['p1'], $_SESSION['p2']); $_SESSION['logs'] = ["O combate vai começar!"]; }
}

if (isset($_POST['atacar']) && isset($_SESSION['arena'])) {
    $novosLogs = $_SESSION['arena']->executarTurno();
    $_SESSION['logs'] = array_merge($novosLogs, $_SESSION['logs'] ?? []);
}

$p1 = $_SESSION['p1'] ?? null;
$p2 = $_SESSION['p2'] ?? null;
$arena = $_SESSION['arena'] ?? null;
$logs = $_SESSION['logs'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8"><title>Pokémon Battle - Boilerplate</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; flex-direction: column; align-items: center; padding: 20px; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 600px; text-align: center; }
        .battle { display: flex; justify-content: space-around; margin: 20px 0; }
        .hp-bar { background: #eee; height: 15px; border-radius: 5px; margin: 10px 0; overflow: hidden; }
        .hp-fill { background: #4caf50; height: 100%; transition: width 0.3s; }
        .logs { background: #222; color: #0f0; padding: 10px; height: 100px; overflow-y: auto; text-align: left; font-family: monospace; border-radius: 5px; }
        .btn { padding: 10px 20px; cursor: pointer; border: none; border-radius: 5px; background: #2196F3; color: white; margin: 5px; }
    </style>
</head>
<body>
<div class="card">
    <h1>⚔️ Pokémon Battle Simulator ⚔️</h1>
    <?php if (!$arena): ?>
        <h3>Selecionar Lutador <?= !$p1 ? '1' : '2' ?></h3>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="number" name="hp" value="100" required>
            <select name="tipo">
                <option value="Fogo">Fogo</option>
                <option value="Agua">Água</option>
                <option value="Planta">Planta</option>
            </select><br><br>
            <button type="submit" name="selecionar" class="btn">Confirmar</button>
        </form>
    <?php else: ?>
        <div class="battle">
            <div><strong><?= $p1->getName() ?></strong><div class="hp-bar"><div class="hp-fill" style="width: <?= $p1->getHp() ?>%"></div></div><?= $p1->getHp() ?> HP</div>
            <div>VS</div>
            <div><strong><?= $p2->getName() ?></strong><div class="hp-bar"><div class="hp-fill" style="width: <?= $p2->getHp() ?>%"></div></div><?= $p2->getHp() ?> HP</div>
        </div>
        <form method="POST"><button type="submit" name="atacar" class="btn" style="background: #f44336; width: 100%;">💥 ATACAR!</button></form>
        <div class="logs"><?php foreach ($logs as $l) echo "> $l<br>"; ?></div>
        <a href="?reset=1"><button class="btn" style="background:#777">Reset</button></a>
    <?php endif; ?>
</div>
</body>
</html>
