<?php 
    // Include the database connection file
    include '../dbinfo.php';

    //Fetch banner details from the database
    $background_image_query = "SELECT header_background_image FROM banner WHERE id = 1";
    $background_image_result = mysqli_query($con, $background_image_query);
    $background_image_row = mysqli_fetch_assoc($background_image_result);
    $background_image_url = $background_image_row['header_background_image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <script src="https://kit.fontawesome.com/ce2d94b0f6.js" crossorigin="anonymous"></script>
    <title>Admin Panel</title>
</head>
<body>
    <header style="background-image: url('<?php echo $background_image_url; ?>');">
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!--Tutorials Section-->
        <div id="tutorials">
            <h2>Tutorials</h2>
            <?php 
            // Fetch tutorials from the database
                $tutorials_query = "SELECT * FROM tutorials";
                $tutorials_result = mysqli_query($con, $tutorials_query);
                while($tutorial = mysqli_fetch_assoc($tutorials_result)) { ?>
                    <div class="tutorial-card">
                        <p><?php echo $tutorial['title']; ?></p>

                        <div class="edit-delete">
                            <a href="./tutorials/edit-tutorial.php?id=<?php echo $tutorial['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="./tutorials/delete-tutorial.php?id=<?php echo $tutorial['id']; ?>"><i class="fa-solid fa-trash"></i> Delete</a>
                        </div>
                    </div>
                <?php } ?>
        </div>

        <div id="addNew-Tutorials">
            <h2>Add New Tutorial</h2>
            <form action="./tutorials/add-tutorial.php" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title">
                </div>
                
                <div class="form-group">
                    <label for="video_url">Video URL</label>
                    <input type="text" id="video_url" name="video_url">
                </div>
                <input type="submit" name="submit" value="Add Tutorial" class="btn">
            </form>
        </div>

        <div id="articles">
            <h2>Articles</h2>
            <?php
                // Fetch articles from the database
                $articles_query = "SELECT * FROM articles";
                $articles_result = mysqli_query($con, $articles_query);
                while($article = mysqli_fetch_assoc($articles_result)) { ?>
                    <div class="article-card">
                        <p><?php echo $article['title']; ?></p>

                        <p><?php echo substr($article['content'], 0, 100); ?>...</p>

                        <div class="edit-delete">
                            <a href="./articles/edit-article.php?id=<?php echo $article['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="./articles/delete-article.php?id=<?php echo $article['id']; ?>"><i class="fa-solid fa-trash"></i> Delete</a>
                        </div>
                    </div>
                <?php } ?>
        </div>

        <div id="addNew-Articles">
            <h2>Add New Article</h2>
            <form action="./articles/add-article.php" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                </div>

                <div class="form-group">
                    <label for="image_url">Image URL</label>
                    <input type="text" name="image_url" id="image_url">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content"></textarea>
                </div>

                <input type="submit" name="submit" value="Add Article" class="btn">
            </form>
        </div>

        <div id="banner">
            <h2>Edit Banner Image</h2>
            <form action="./edit-banner.php" method="POST">
                <div class="form-group">
                    <label for="banner__image">Banner Image</label>
                    <input type="text" name="banner__image" id="banner__image">
                </div>
                <input type="submit" value="Update Image" class="btn">
            </form>
        </div>
    </main>
</body>
</html>