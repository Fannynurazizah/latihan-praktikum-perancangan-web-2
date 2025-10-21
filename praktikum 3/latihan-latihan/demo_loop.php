<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo Loop Baru</title>
    <style>
        body { font-family: Arial; line-height: 1.8; }
        b { color: darkblue; }
    </style>
</head>
<body>

<?php
// WHILE → tampilkan 1 sampai 5
$i = 1;
echo "<b>While Loop:</b><br>";
while ($i <= 5) {
    echo $i . " ";
    $i++;
}

// DO-WHILE → tampilkan 10 sampai 15
$j = 10;
echo "<br><br><b>Do While Loop:</b><br>";
do {
    echo $j . " ";
    $j++;
} while ($j <= 15);

// FOR → tampilkan 2, 4, 6, 8, 10
echo "<br><br><b>For Loop:</b><br>";
for ($k = 2; $k <= 10; $k += 2) {
    echo $k . " ";
}

// FOREACH → tampilkan isi array dengan nilai acak
echo "<br><br><b>Foreach Loop:</b><br>";
$angka = [5, 15, 25, 35, 45];
foreach ($angka as $value) {
    echo $value . " ";
}
?>

</body>
</html>
