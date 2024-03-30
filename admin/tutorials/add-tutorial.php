<?php
// Database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "assignment2";

// Creating a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// To ensure that the connection is made
if ($pdo) {
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];

    // Insert the tutorial into the database
    $insert_query = "INSERT INTO tutorials (title, video_url) VALUES (:title, :video_url)";
    $insert = $pdo->prepare($insert_query);
    $insert->bindParam(':title', $title);
    $insert->bindParam(':video_url', $video_url);

    if($insert->execute()){
        header('Location: ../admin-index.php?SuccessfullyInserted');
        exit();
    } else{
        header('Location: ../admin-index.php?FailedToInsert');
        exit();
    }

} else {
    // Connection failed
    header('Location: ../admin-index.php?ConnectionFailed');
    exit();
}



?>
