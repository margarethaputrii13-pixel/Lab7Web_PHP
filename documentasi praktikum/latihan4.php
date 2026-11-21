<?php
function hitungDiskon($harga, $persen) {
$potongan = $harga * ($persen / 100);
return $harga - $potongan;
}
$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".");
?>
<?php
function formatRupiah($harga) {
    return "Rp" . number_format($harga, 0, ",", ".");
}

$harga1 = 150000;
$harga2 = 2500000;
$harga3 = 75000;

echo "<br>Harga pertama: " . formatRupiah($harga1) . "<br>";
echo "Harga kedua: " . formatRupiah($harga2) . "<br>";
echo "Harga ketiga: " . formatRupiah($harga3) . "<br>";