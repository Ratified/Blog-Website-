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

// Check if article ID is provided
if (!isset($_GET['id'])) {
    echo "Article ID not provided.";
    exit();
}

// Fetch article details from the database based on ID
$article_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
$stmt->bindParam(':article_id', $article_id);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if article with provided ID exists
if (!$article) {
    echo "Article not found.";
    exit();
}

// Check if form is submitted for updating article
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update article in the database
    $stmt = $pdo->prepare("UPDATE articles SET title = :title, content = :content WHERE id = :article_id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':article_id', $article_id);
    $stmt->execute();

    // Redirect after updating article
    header("Location: ../admin-index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/editArticle.css">
    <title>Edit Article</title>
</head>
<body>
    <div class="editArticle__container">
        <h2>Edit Article</h2>
        <form method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $article['title']; ?>">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content"><?php echo $article['content']; ?></textarea>
            </div>
            
            <div class="form-btn">
                <input type="submit" name="submit" value="Submit" class="btn">
                <a href="../admin-index.php" class="btn btn.cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>