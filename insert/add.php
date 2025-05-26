<?php
include('../conect/config.php');

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publication_year = $_POST["year"];
    $genre = $_POST["genre"];
    $yo = "INSERT INTO books (title, author, publication_year, genre) VALUES ('$title', '$author','$publication_year', '$genre')";
    $result = mysqli_query($conn, $yo);
    header("Location: ../frontend/file.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library file</title>
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
        <h2 class="text-muted">Digital Library</h2>
        <h3 class="text-muted">Add a Book file</h3>
        <span class="fs-5 text-danger" id="err_year"></span>
        <form action="" method="POST">
            <div class="container d-flex justify-content-center mt-5">
                <div class="card p-3 bg-transparent border-0">
                    <label for="title" class="p-2">Title: </label>
                    <label for="author" class="p-2">Author: </label>
                    <label for="year" class="p-2">Publication Year: </label>
                    <label for="genre" class="p-2">Genre: </label>
                </div>
                <div class="card bg-transparent border-0 m-3">
                    <input type="text" class="m-1" name="title" required />
                    <input type="text" class="m-1" name="author" required />
                    <input type="number" class="m-1" name="year" id="year" required />
                    <input type="text" class="m-1" name="genre" required />
                </div>
            </div>
            <div class="card bg-transparent border-0 align-items-center">
                <button class="p-1 m-2 w-25 bg-primary btn text-light" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>