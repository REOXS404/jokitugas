<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $major = $_POST['major'];
    $deadline = $_POST['deadline'];
    $format = $_POST['format'];

    $sql = "INSERT INTO tasks (user_id, name, phone, email, subject, major, deadline, format) VALUES ('$user_id', '$name', '$phone', '$email', '$subject', '$major', '$deadline', '$format')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Tugas berhasil ditambahkan. <a href='dashboard.php'>Kembali ke Dashboard</a></div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<?php include 'templates/header.php'; ?>

<h2>Tambah Tugas</h2>
<form method="post" action="">
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="phone">No. HP:</label>
        <input type="text" class="form-control" name="phone" id="phone" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="subject">Matakuliah:</label>
        <input type="text" class="form-control" name="subject" id="subject" required>
    </div>
    <div class="form-group">
        <label for="major">Jurusan:</label>
        <input type="text" class="form-control" name="major" id="major" required>
    </div>
    <div class="form-group">
        <label for="deadline">Deadline:</label>
        <input type="date" class="form-control" name="deadline" id="deadline" required>
    </div>
    <div class="form-group">
        <label for="format">Format Tugas:</label>
        <input type="text" class="form-control" name="format" id="format" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Tugas</button>
</form>

<?php include 'templates/footer.php'; ?>
