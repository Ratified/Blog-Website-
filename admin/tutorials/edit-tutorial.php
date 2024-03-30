<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "assignment2";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if tutorial ID is provided
if (!isset($_GET['id'])) {
    echo "Tutorial ID not provided.";
    exit();
}

// Fetch tutorial details from the database based on ID
$tutorial_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tutorials WHERE id = :tutorial_id");
$stmt->bindParam(':tutorial_id', $tutorial_id);
$stmt->execute();
$tutorial = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if tutorial with provided ID exists
if (!$tutorial) {
    echo "Tutorial not found.";
    exit();
}

// Check if form is submitted for updating tutorial
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];

    // Update tutorial in the database
    $stmt = $pdo->prepare("UPDATE tutorials SET title = :title, video_url = :video_url WHERE id = :tutorial_id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':video_url', $video_url);
    $stmt->bindParam(':tutorial_id', $tutorial_id);
    $stmt->execute();

    // Redirect after updating tutorial
    header("Location: ../admin-index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/editTutorial.css">
    <title>Edit Tutorial</title>
</head>
<body>
    <div class="edit__tutorialContainer">
        <h2>Edit Tutorial</h2>
        <form method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $tutorial['title']; ?>">
            </div>

            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input type="text" id="video_url" name="video_url" value="<?php echo $tutorial['video_url']; ?>">
            </div>
            
            <div class="form-btn">
                <input type="submit" name="submit" value="Submit" class="btn">
                <a href="../admin-index.php" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
