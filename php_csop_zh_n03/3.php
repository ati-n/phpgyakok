<?php
$file = json_decode(file_get_contents('3.json'), true);
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>3. feladat</title>
</head>

<body>
    <!-- Ez két oldal egyben, ezek közül egyszerre csak az egyiket kell
    megjeleníteni, vagy akár ki is lehet szervezni külön fájlokba! -->

    <h1>Szállítási címek</h1>
    <ul>
        <?php foreach ($file as $r) : ?>
            <li><a href="show.php?id=<?= $r['id'] ?>"> <?= $r['address'] ?> </a></li>
        <?php endforeach; ?>
    </ul>

    <h1>Cím részletei</h1>
    <form action="" method="post">
        <b>Azonosító:</b> <br>
        <b>Cím:</b> <br>
        <b>Megjegyzés:</b> <br>
        <textarea name="notes" cols="60" rows="4"></textarea> <br>
        <button type="submit">Mentés</button>
    </form>
</body>

</html>