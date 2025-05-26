<?php
include('../conect/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data
    $query = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result);
    } else {
        die("Record not found or SQL error: " . mysqli_error($conn));
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];

    // Update the database
    $update = "UPDATE books SET title = '$title', author = '$author', publication_year = '$year', genre = '$genre' WHERE id = $id";
    $result = mysqli_query($conn, $update);

    if ($result) {
        echo "Record updated successfully.";
        header("Location: ../frontend/file.php");
        exit;
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #eefff9;
        }
        h2, h3 {
            text-align: center;
        }
        h3 {
            font-size: large;
        }
    </style>
</head>
<body>
    <div class="container col-md-8 mt-5">
        <h2 class="text-muted">Edit Book</h2>
        <h3 class="text-muted">Update Book Information</h3>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>" />
            <div class="container d-flex justify-content-center mt-5">
                <div class="card p-3 bg-transparent border-0">
                    <label for="title" class="p-2">Title: </label>
                    <label for="author" class="p-2">Author: </label>
                    <label for="year" class="p-2">Publication Year: </label>
                    <label for="genre" class="p-2">Genre: </label>
                </div>
                <div class="card bg-transparent border-0 m-3">
                    <input type="text" class="m-1" name="title" value="<?php echo $book['title']; ?>" required />
                    <input type="text" class="m-1" name="author" value="<?php echo $book['author']; ?>" required />
                    <input type="number" class="m-1" name="year" id="year" value="<?php echo $book['publication_year']; ?>" required />
                    <input type="text" class="m-1" name="genre" value="<?php echo $book['genre']; ?>" required />
                </div>
            </div>
            <div class="card bg-transparent border-0 align-items-center">
                <button class="p-1 m-2 w-25 bg-primary btn text-light" type="submit" name="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>