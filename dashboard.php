<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<?php include 'templates/header.php'; ?>

<h2>Dashboard</h2>
<a href="add_task.php" class="btn btn-primary mb-3">Tambah Tugas</a>

<h3>Daftar Tugas</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Email</th>
            <th>Matakuliah</th>
            <th>Jurusan</th>
            <th>Deadline</th>
            <th>Format Tugas</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <td><?php echo $row['deadline']; ?></td>
            <td><?php echo $row['format']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
