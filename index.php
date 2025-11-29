<?php
require_once 'classes/Sandslash.php';
session_start();

if (!isset($_SESSION['myPokemon'])) {
    $_SESSION['myPokemon'] = new Sandslash();
    $_SESSION['history'] = [];
}
$pokemon = $_SESSION['myPokemon'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PokéCare - Dashboard</title>
    <link rel="stylesheet" href="style.css?v=3">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="dashboard-container">
        
        <div class="left-panel">
            <h4 class="sub-header">POKÉMON RESEARCH & TRAINING CENTER</h4>
            <h1 class="main-title">PokéCare System</h1>
            <p class="description">
                Selamat datang, Trainer! Sistem ini siap membantu Anda memantau perkembangan 
                <strong>Sandslash</strong>. Pantau statistik, latih kemampuan, dan lihat riwayat perkembangan di sini.
            </p>

            <div class="menu-buttons">
                <a href="train.php" class="btn btn-primary">
                    <span class="icon">⚔️</span>
                    <div class="btn-text">
                        <strong>Mulai Latihan</strong>
                        <small>Tingkatkan Level & HP</small>
                    </div>
                </a>
                
                <a href="history.php" class="btn btn-secondary">
                    <span class="icon">📜</span>
                    <div class="btn-text">
                        <strong>Riwayat Latihan</strong>
                        <small>Cek Log Aktivitas</small>
                    </div>
                </a>
            </div>
        </div>

        <div class="right-panel">
            <div class="tcg-card">
                <div class="tcg-header">
                    <span class="basic-tag">Basic</span>
                    <h2 class="tcg-name"><?= $pokemon->getName(); ?></h2>
                    <div class="tcg-hp">
                        <small>HP</small> <?= $pokemon->getHp(); ?>
                        <span class="type-icon-small">⛰️</span>
                    </div>
                </div>

                <div class="tcg-image-frame">
                    <img src="<?= $pokemon->getImage(); ?>" alt="Sandslash" class="tcg-img">
                </div>

                <div class="tcg-info-strip">
                    <span>Ground Pokémon. Length: 1.0m, Weight: 29.5kg</span>
                </div>

                <div class="tcg-body">
                    <div class="tcg-move">
                        <div class="move-cost">
                            <span class="energy">⛰️</span>
                            <span class="energy">⚪</span>
                        </div>
                        <div class="move-detail">
                            <strong><?= $pokemon->getSpecialMove(); ?></strong>
                            <p>Mengguncang tanah. Musuh tipe Electric tidak berpengaruh.</p>
                        </div>
                        <div class="move-damage">80</div>
                    </div>

                    <div class="tcg-stat-bar">
                        <div class="stat-row">
                            <span>Level</span>
                            <strong><?= $pokemon->getLevel(); ?></strong>
                        </div>
                        <div class="stat-row">
                            <span>Weakness</span>
                            <span>💧 Water</span>
                        </div>
                    </div>
                </div>

                <div class="tcg-footer">
                    <small>Illus. Tor Monitor Ketua &copy; 2025</small>
                </div>
            </div>
        </div>

    </div>

</body>
</html>