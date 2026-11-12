<?php
include 'db.php';

if (isset($_POST['delete']) && ctype_digit((string) $_POST['delete'])) {
    $id = (int) $_POST['delete'];

    $sql = $conn->prepare("DELETE FROM result WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        header("Location: index.php");
        exit;
    }
}
?>