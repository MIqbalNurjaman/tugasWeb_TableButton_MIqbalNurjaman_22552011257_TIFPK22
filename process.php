<?php
session_start();

// Jika tombol Simpan ditekan
if (isset($_POST['spn'])) {
    $mahasiswa = array(
        "nama" => $_POST['nama'],
        "nim" => $_POST['nim'],
        "alamat" => $_POST['alamat'],
        "jenis_kelamin" => $_POST['jenis_kelamin'],
        "jurusan" => $_POST['jurusan']
    );

    // Simpan data mahasiswa ke dalam session
    $_SESSION['data_mahasiswa'][] = $mahasiswa; // Menambahkan data baru ke array
}

// Jika tombol Reset ditekan
if (isset($_POST['reset'])) {
    unset($_SESSION['data_mahasiswa']); // Menghapus semua data mahasiswa
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css"> <!-- Menautkan file CSS -->
</head>
<body>
    <h1>Tabel Data Mahasiswa</h1>

    <?php
    // Tampilkan data mahasiswa jika ada
    if (isset($_SESSION['data_mahasiswa']) && !empty($_SESSION['data_mahasiswa'])) {
        echo '<table>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                </tr>';

        // Menampilkan data mahasiswa dari session
        foreach ($_SESSION['data_mahasiswa'] as $index => $data) {
            echo "<tr>
                    <td>" . ($index + 1) . "</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['nim']}</td>
                    <td>{$data['alamat']}</td>
                    <td>{$data['jenis_kelamin']}</td>
                    <td>{$data['jurusan']}</td>
                  </tr>";
        }
        echo '</table>';
    } else {
        echo '<p>Tidak ada data mahasiswa.</p>';
    }
    ?>

    <div>
        <a href="index.html" class="button">Kembali ke Form</a> <!-- Tombol Kembali -->
        <form action="process.php" method="POST" style="display:inline;">
            <input type="submit" name="reset" value="Reset Tabel" class="button"> <!-- Tombol Reset Tabel -->
        </form>
    </div>

    <footer>
        <p>© 2024 M. Iqbal Nurjaman - 22552011257 - TIFPK22</p>
    </footer>
</body>
</html>