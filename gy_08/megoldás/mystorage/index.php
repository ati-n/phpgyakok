<?php
$reg = json_decode(file_get_contents('../storage/data.json'), true);
// User sort, nev szerint sorba rendezi
uasort($reg, function ($a, $b) {
    return strcmp($a['fullname'], $b['fullname']);
});

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (count($_POST) > 0 && count($errors) == 0) : ?>
        <span style="color: green;">Mentés sikeres!</span><br>
    <?php endif; ?>
    <table>
        <tr>
            <th>Nev</th>
            <th>TAJ</th>
            <th>Email</th>
            <th>Ev</th>
            <th>Nem</th>
            <th>Reg.datuma</th>
            <th>Megjegyzes</th>
        </tr>
        <?php foreach ($reg as $student) : ?>
            <tr>
                <td><?= $student["fullname"] ?></td>
                <td><?= $student["taj"] ?></td>
                <td><?= $student["email"] ?></td>
                <td><?= $student["age"] ?></td>
                <td><?= $student["gender"] ?></td>
                <td><?= $student["regdate"] ?></td>
                <td><?= $student["notes"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="reg.php">
        <button type="button">Uj felhasznalo regisztralasa</button>
    </a>
</body>

</html>