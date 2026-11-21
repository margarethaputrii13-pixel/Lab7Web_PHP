<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian Mahasiswa</title>
</head>
<body>

    <h2>Cari Nama Mahasiswa</h2>

    <form method="GET">
        <input type="text" name="kata" placeholder="Masukkan nama">
        <button type="submit">Cari</button>
    </form>

    <?php
    if (isset($_GET["kata"])) {
        $kata = trim($_GET["kata"]);

        if (in_array($kata, $mahasiswa)) {
            echo "<p>Nama " . htmlspecialchars($kata) . " ditemukan.</p>";
        } else {
            echo "<p>Nama tidak ditemukan.</p>";
        }
    }
    ?>

</body>
</html>