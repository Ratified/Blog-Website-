<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "assignment2";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if article ID is provided
if (!isset($_GET['id'])) {
    echo "Tutorial ID not provided.";
    exit();
}

$tutorial_id = $_GET['id'];

try {
    $sql = "DELETE FROM tutorials WHERE id = :tutorial_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':tutorial_id', $tutorial_id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header('Location: ../admin-index.php');
        exit();
    } else {
        echo "Failed to delete.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
