<?php 
//Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "assignment2";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}

if($pdo){
    $title = $_POST['title'];
    $image_url = $_POST['image_url'];
    $content = $_POST['content'];

    $sql = "INSERT INTO articles (title, image_url, content) VALUES (:title, :image_url, :content)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->bindParam(':content', $content);

    if($stmt->execute()){
        header('Location: ../admin-index.php?SuccessfullyInserted');
        exit();
    } else{
        header('Location: ../admin-index.php?FailedToInsert');
        exit();
    }
} else{
    echo "Database Connection failed!";
}