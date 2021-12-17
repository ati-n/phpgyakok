<?php
$products = [
    ['name' => 'Asus TUF 144 Hz IPS gamer monitor', 'price' => 67990, 'amount' => 348],
    ['name' => 'Electrolux PerfectCare elöltöltős mosógép', 'price' => 89990, 'amount' => 27],
    ['name' => 'Orion 32-inch HD Ready LED televízió', 'price' => 49980, 'amount' => 245],
    ['name' => 'Canon multifunkciós színes lézernyomtató', 'price' => 77590, 'amount' => 9],
    ['name' => 'Samsung kombinált álló hűtőszekrény', 'price' => 170490, 'amount' => 6],
    ['name' => 'Lenovo vízálló sport-okosóra', 'price' => 18990, 'amount' => 430],
    ['name' => 'Apple iPhone SE2 kártyafüggetlen okostelefon', 'price' => 149990, 'amount' => 200],
    ['name' => 'Logitech vezeték nélküli USB billentyűzet', 'price' => 12990, 'amount' => 78]
];

uasort($products, function ($a, $b) {
    return $b["amount"] <=> $a["amount"];
});

function prodsum($data)
{
    $sum = 0;
    foreach ($data as $prod)
        $sum += $prod["price"] * $prod["amount"];

    return $sum;
}

function leastsold($data)
{
    $arr =  array_filter($data, fn ($x) => $x["amount"] < 10);
    return end($arr)["name"];
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>1. feladat</title>
</head>

<body>
    <h1>Eladások áttekintése</h1>
    <table>
        <thead>
            <tr>
                <th>Megnevezés</th>
                <th>Darab</th>
                <th>Egységár</th>
                <th>Eladási ár</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $row) : ?>
                <tr>
                    <td>
                        <?= $row["name"] ?>
                    </td>
                    <td>
                        <?= $row["price"] ?>
                    </td>
                    <td>
                        <?= $row["amount"] ?>
                    </td>
                    <td>
                        <?= $row["price"] * $row["amount"] . " Ft" ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <b>Eladási összérték:</b> <?= prodsum($products) ?> Ft <br>
    <b>Kevesett eladott termék:</b> <?= leastsold($products) ?>
</body>

</html>