<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama == "") {
        $error[] = "Nama wajib diisi.";
    }

    if ($nim == "") {
        $error[] = "NIM wajib diisi.";
    }

    if ($prodi == "") {
        $error[] = "Program studi wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>

    <h2>Formulir Data Mahasiswa</h2>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <br><br>

        <label>NIM:</label>
        <input type="text" name="nim" required>
        <br><br>

        <label>Program Studi:</label>
        <input type="text" name="prodi" required>
        <br><br>

        <label>Semester:</label>
        <input type="number" name="semester" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <button type="submit">Kirim Data</button>
        <button type="Reset">Reset</button>
    </form>

    <?php
    if ($error) {
        echo "<h3>Terjadi Kesalahan:</h3>";

        foreach ($error as $pesan) {
            echo "<p>" . htmlspecialchars($pesan) . "</p>";
        }
    }

    if ($data) {
        echo "<h3>Data Mahasiswa Berhasil Diterima</h3>";
        echo "Nama: " . htmlspecialchars($data["nama"]) . "<br>";
        echo "NIM: " . htmlspecialchars($data["nim"]) . "<br>";
        echo "Program Studi: " . htmlspecialchars($data["prodi"]) . "<br>";
        echo "Semester: " . $data["semester"] . "<br>";
        echo "Email: " . htmlspecialchars($data["email"]);
    }
    ?>

</body>
</html>