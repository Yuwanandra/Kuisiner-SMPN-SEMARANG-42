<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smp_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$kelas = isset($_POST['kelas']) ? implode(", ", $_POST['kelas']) : null;
$jenis_kelamin = $_POST['jenis_kelamin'];
$penilaian_1 = $_POST['penilaian_1'];
$penilaian_2 = $_POST['penilaian_2'];

// Insert data into table
$sql = "INSERT INTO penilaian_guru (kelas, jenis_kelamin, penilaian_1, penilaian_2)
        VALUES ('$kelas', '$jenis_kelamin', '$penilaian_1', '$penilaian_2')";

if ($conn->query($sql) === TRUE) {
    echo "Penilaian berhasil disimpan!";
    echo "<a href='siswa.html'>Kembali</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
