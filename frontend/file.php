<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books record</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <style>
        body {
            background-color: #eefff9;
        }
    </style>
</head>
<body>
    <div class="container col-md-8 align-items-center d-flex flex-column mt-5">
    <h2 class="text-muted">Digital laibrary</h2>
    <a class="btn btn-primary fs-7 mt-4" role="button" href="../insert/add.php">Add book</a><br>
<table class="table">
    <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Publication Year</th>
          <th>Genre</th>
        </tr>
    </thead>
        <?php
        include ('../conect/config.php');

        $read = "SELECT * FROM books";
        $result = $conn -> query($read);

        if(!$result){
            die("Invalid:".$conn->error);
        }
        while($row = $result->fetch_assoc()){
            echo "
            <tr>
                <td>$row[title]</td>
                <td>$row[author]</td>
                <td>$row[publication_year]</td>
                <td>$row[genre]</td>
                <td>
                    <a class='btn btn-sm btn-success' href='../edit/edit.php?id=$row[id]' >Edit
                    </a>
                    <a class='btn btn-sm btn-danger' href='../delet/delet.php?id=$row[id]'>Delet</a>
                </td>
            </tr>
            ";
        }

        ?>
      </table>
    </div>
</body>
</html>