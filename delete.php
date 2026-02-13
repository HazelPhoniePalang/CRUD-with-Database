<?php
include __DIR__ . '/component/pdo.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: view.php");
    exit;
}

if (isset($_POST["delete_all"])) {
    $stmt = $pdo->prepare("DELETE FROM users");
    $stmt->execute();
    header("Location: view.php?deleted_all=1");
    exit;
}

if (empty($_POST["id"]) || !ctype_digit((string) $_POST["id"])) {
    header("Location: view.php?deleted=0");
    exit;
}

$id = (int) $_POST["id"];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

if ($stmt->rowCount() > 0) {
    header("Location: view.php?deleted=1");
    exit;
}

header("Location: view.php?deleted=0");
exit;
?>
