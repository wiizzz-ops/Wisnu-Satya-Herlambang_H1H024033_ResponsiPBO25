<?php
require_once 'classes/Sandslash.php';
session_start();

if (!isset($_SESSION['myPokemon'])) {
    header("Location: index.php");
    exit;
}

$pokemon = $_SESSION['myPokemon'];
$message = "";
$statChange = null;
$lastTrainingType = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = isset($_POST['training_type']) ? $_POST['training_type'] : 'Defense';
    $intensity = isset($_POST['intensity']) ? intval($_POST['intensity']) : 5;
    
    $levelBefore = $pokemon->getLevel();
    $hpBefore = $pokemon->getHp();

    $pokemon->train($type, $intensity);

    $log = [
        'date' => date('d M Y, H:i'),
        'type' => $type,
        'intensity' => $intensity,
        'level_before' => $levelBefore,
        'level_after' => $pokemon->getLevel(),
        'hp_before' => $hpBefore,
        'hp_after' => $pokemon->getHp()
    ];
    
    array_unshift($_SESSION['history'], $log);
    $_SESSION['myPokemon'] = $pokemon;
    
    $message = "Latihan Berhasil!";
    $statChange = [
        'lvl' => $pokemon->getLevel() - $levelBefore,
        'hp' => $pokemon->getHp() - $hpBefore
    ];

    $lastTrainingType = strtolower($type);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Training Arena - Sandslash</title>
    <link rel="stylesheet" href="style.css?v=3">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="training-wrapper">
        <div class="training-card">
            
            <div class="form-section">
                <h2 class="section-title">⚔️ Training Arena</h2>
                <p class="subtitle">Pilih program latihan bertema tanah!</p>

                <?php if ($message): ?>
                    <div class="alert-box success">
                        <div class="alert-content">
                            <strong><?= $message; ?></strong>
                            <p>Naik +<?= $statChange['lvl']; ?> Level | +<?= $statChange['hp']; ?> HP</p>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <label>Target Latihan</label>
                        <div class="radio-group-vertical">
                            <input type="radio" name="training_type" id="t_def" value="Defense" checked>
                            <label for="t_def" class="radio-card earth-btn">
                                <span class="icon type-defense">🛡️</span>
                                <div class="text">
                                    <strong>Defense</strong>
                                    <small>Rekomendasi (Bonus Tinggi)</small>
                                </div>
                            </label>

                            <input type="radio" name="training_type" id="t_atk" value="Attack">
                            <label for="t_atk" class="radio-card earth-btn">
                                <span class="icon type-attack">⚔️</span>
                                <div class="text">
                                    <strong>Attack</strong>
                                    <small>Latihan Serangan</small>
                                </div>
                            </label>

                            <input type="radio" name="training_type" id="t_spd" value="Speed">
                            <label for="t_spd" class="radio-card earth-btn">
                                <span class="icon type-speed">⚡</span>
                                <div class="text">
                                    <strong>Speed</strong>
                                    <small>Latihan Kecepatan</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Intensitas Latihan</label>
                        <div class="intensity-options">
                            <?php foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $val): ?>
                                <input type="radio" name="intensity" id="i_<?= $val ?>" value="<?= $val ?>" <?= $val==6 ? 'checked' : '' ?>>
                                <label for="i_<?= $val ?>" class="intensity-btn earth-btn-small"><?= $val ?></label>
                            <?php endforeach; ?>
                        </div>
                        <p style="font-size: 11px; color: #8d6e63; margin-top: 5px;">*Semakin tinggi angka, semakin besar dampak latihan.</p>
                    </div>

                    <button type="submit" class="btn btn-primary large earth-submit"> Mulai Latihan</button>
                </form>

                <a href="index.php" class="link-back">← Kembali ke Dashboard</a>
            </div>

            <div class="image-section">
                <div class="image-glow"></div>
                
                <?php if ($message): ?>
                    <div class="training-effect-overlay animate-<?= $lastTrainingType ?>"></div>
                    
                    <div class="levelup-notification">
                        <div class="notif-icon">🔥</div>
                        <div class="notif-content">
                            <h3>Latihan Sukses!</h3>
                            <div class="notif-stats">
                                <span class="stat-badge level <?= $statChange['lvl'] > 0 ? 'up' : '' ?>">
                                    Level +<?= $statChange['lvl']; ?>
                                </span>
                                <span class="stat-badge hp up">
                                    HP +<?= $statChange['hp']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <img src="<?= $pokemon->getGif(); ?>" alt="Sandslash Training" class="pokemon-action-img">
                
                <div class="img-caption">
                    <h3><?= $pokemon->getName(); ?></h3>
                    <div class="level-badge">Level <?= $pokemon->getLevel(); ?></div>
                    <span>Ready to Train!</span>
                </div>
            </div>

        </div>
    </div>
</body>
</html>