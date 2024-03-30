<?php 
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
    $banner__image = $_POST['banner__image'];
    $sql = "UPDATE banner SET header_background_image = :header_background_image WHERE id = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':header_background_image', $banner__image);

    if($stmt->execute()){
        header('Location: admin-index.php');
        exit();
    } else{
        echo "Update Failed";
    }

} else{
    echo "Database Connection Failed";
}