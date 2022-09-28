<?php

require_once __DIR__ . '/functions.php';

$dbh = connect_db();
$sql = 'SELECT * FROM animals';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ペットショップ1</title>
</head>

<body>

    <div style=margin-left:40px>
        <h2>本日のご紹介ペット！</h2>
    </div>

    <?php foreach ($animals as $animal) : ?>
        <ul style="list-style-type: none;">
            <li><?= h($animal['type']) . 'の' . h($animal['classification']) . 'ちゃん' ?></li>
            <li><?= ($animal['description']) ?></li>
            <li><?= ($animal['birthday']) . '生まれ' ?></li>
            <li style="border-bottom: solid 1px #888888;">
                <div style=margin-bottom:15px;>出身地 <?= ($animal['birthplace']) ?></div>
            </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>
