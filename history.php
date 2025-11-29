<?php
session_start();

$historyLog = isset($_SESSION['history']) ? $_SESSION['history'] : [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Latihan - PokéCare</title>
    <link rel="stylesheet" href="style.css?v=3">
</head>
<body>
    <div class="container history-container">
        <h2>📜 Riwayat Latihan Sandslash</h2>
        
        <?php if (empty($historyLog)): ?>
            <p style="text-align: center; color: #666;">Belum ada sesi latihan yang dilakukan.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Jenis Latihan</th>
                            <th>Intensitas</th>
                            <th>Level (Awal ➝ Akhir)</th>
                            <th>HP (Awal ➝ Akhir)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historyLog as $log): ?>
                            <tr>
                                <td><?= $log['date']; ?></td>
                                <td><?= htmlspecialchars($log['type']); ?></td>
                                <td><?= $log['intensity']; ?></td>
                                <td>
                                    <span class="stat-change"><?= $log['level_before']; ?></span> 
                                    ➝ 
                                    <span class="stat-highlight"><?= $log['level_after']; ?></span>
                                </td>
                                <td>
                                    <span class="stat-change"><?= $log['hp_before']; ?></span> 
                                    ➝ 
                                    <span class="stat-highlight"><?= $log['hp_after']; ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div style="margin-top: 20px;">
            <a href="index.php" class="btn">Kembali ke Beranda</a>
            <a href="train.php" class="btn outline">Latihan Lagi</a>
        </div>
    </div>
</body>
</html>