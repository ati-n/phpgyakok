<?php
    // TŰRI ERIK - Webprogramozás
    // 8. gyakorló feladatsor megoldásai

    // declare(strict_types = 1);

    // 1. feladat - v1
    function fact1(int $n) {
        if ($n == 0) return 1;
        return $n * fact1($n - 1);
    }
    // 1. feladat - v2
    function fact2($n) {
        $r = 1;
        for ($i = 2; $i <= $n; $i++) $r *= $i;
        return $r;
    }
?>

<h1>1. feladat</h1>
<?= fact1(5) . "<br>" ?>
<?= fact2(5) . "<br>" ?>

<h1>2. feladat</h1>
<?php
    for ($i = 1; $i <= 6; $i++)
        echo "<h${i}>Hello világ!</h${i}>";
?>

<h1>3. feladat</h1>
<?php
    $t = [1, 2, 3, 4, 5, 6, 7];

    print_r(array_map(function ($x){
        return $x * $x;
    }, array_filter($t, function ($x){
        return $x % 2 == 0;
    })));

    // PHP 7.4-től arrow function!
    print_r(array_map(fn($x) => $x * $x, array_filter($t, fn($x) => $x % 2 == 0)));
?>

<h1>4. feladat</h1>
<?php
    function array_every1(array $arr, callable $fn): bool {
        foreach($arr as $e)
            if (!$fn($e)) return false;
        return true;
    }
    $test1 = [2, 4, 8, 0, -4];
    $test2 = [4, 3, 0, 2, -4];

    function array_every2(array $arr, callable $fn): bool{
        reset($arr);
        while($e = current($arr)){
            if (!$fn($e)) return false;
            next($arr);
        }
        return true;
    }

    function test_even(int $n): bool {
        return !($n % 2);
    }

    var_dump(array_every1($test1, "test_even"));
    var_dump(array_every1($test2, "test_even"));
    var_dump(array_every2($test1, "test_even"));
    var_dump(array_every2($test2, "test_even"));
?>

<?php
    // 5. feladat
    $errors = ["Syntax error", "Stack overflow", "Out of memory"];
?>
<h1>5. feladat</h1>
<ul>
    <?php foreach($errors as $e): ?>
        <li> <?= $e ?> </li>
    <?php endforeach; ?>
</ul>

<?php
    // 6. feladat
    $bank = [
        [
            "kerdes" => "De szép bauxit, honnan van?",
            "valaszok" => ["a" => "Keddet szeretem a szombatban", "b" => "Babi néni, gyere ki!", "c" => "Háromlábú az én babám", "d" => "Nicole Kidman disznót vág"],
            "helyes" => "b"
        ],
        [
            "kerdes" => "Mit csináljak belőle?",
            "valaszok" => [1 => "Szilvásbuktát, mert azt szeretem", 2 => "Pálinkát", 3 => "Dementorosat"],
            "helyes" => 1
        ]
    ]
?>

<h1>6. feladat</h1>
<?php foreach($bank as $id => $q): ?>
    <b> <?= $q["kerdes"] ?> </b><br>
    <?php foreach ($q["valaszok"] as $jel => $szoveg): ?>
        <input type="radio" name="q<?= $id ?>" value="<?=$jel?>" <?= $jel == $q["helyes"] ? "checked" : "" ?> disabled> <?= $jel . ".) " . $szoveg ?><br>
    <?php endforeach; ?>
    <br>
<?php endforeach; ?>

<h1>7. feladat</h1>
Áthelyezve a következő órára! :)