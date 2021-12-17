<?php

$product_id = $_POST["product_id"] ?? "";
$old_price = $_POST["old_price"] ?? "";
$new_price = $_POST["new_price"] ?? "";

if (count($_POST) > 0) {
    $errors = [];
    if (trim($product_id) === '') {
        $errors['product_id'] = 'Termékazonosító kitöltése kötelező!';
    } else if (strlen($product_id) < 6) {
        $errors['product_id'] = 'Azonosito legalább 6 hosszu legyen!';
    }

    if (trim($old_price) === '') {
        $errors['old_price'] = 'Regi ar kitöltése kötelező!';
    } else if (filter_var($old_price, FILTER_VALIDATE_INT) === false) {
        $errors['old_price'] = 'Egesz szam kell legyen!';
    }

    if (trim($new_price) === '') {
        $errors['new_price'] = 'Uj ar kitöltése kötelező!';
    } else if (filter_var($new_price, FILTER_VALIDATE_INT) === false) {
        $errors['new_price'] = 'Egesz szam kell legyen!';
    } else if ($new_price < 0) {
        $errors['new_price'] = 'Poztiiv szam kell legyen!';
    } else if ($new_price  < $old_price) {
        $errors['new_price'] = 'Regi arnal nagyobb szam kell legyen!';
    }

    $errors = array_map(fn ($err) => "<span style='color: red'>$err</span>", $errors);
}


?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>2. feladat</title>
</head>

<body>
    <h1>Leárazáskalkulátor</h1>
    <form action="2.php" method="post" novalidate>
        <label for="product_id">Termékazonosító:</label><input type="text" name="product_id" value="<?= $product_id ?>"> <?= $errors['product_id'] ?? '' ?> <br>
        <label for="old_price">Régi ár:</label><input type="text" name="old_price" value="<?= $old_price ?>"> <?= $errors['old_price'] ?? '' ?> <br>
        <label for="new_price">Új ár:</label><input type="text" name="new_price" value="<?= $new_price ?>"> <?= $errors['new_price'] ?? '' ?> <br>
        <button type="submit">OK</button>
    </form>
</body>

</html>