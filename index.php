<?php
include 'conn.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO `crud` (`title`, `description`) VALUES ('$title', '$desc');"; 

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data inserted successfully";
    } else {
        echo "Data not inserted";
    }
}
?>

<!doctype html>
<html lang="en"> <!-- Fixed missing '>' -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <div class="container my-4 p-5">
    <form method="post" action="" style="display: flex; flex-direction: column; align-items: center;">
        <div class="mb-4 col-md-6">
            <label for="noteTitle" class="form-label">Note Title</label>
            <input type="text" class="form-control" name="title" id="noteTitle" placeholder="Enter note title" required>
        </div>

        <div class="form-floating mb-4 col-md-6">
            <textarea class="form-control" name="description" placeholder="Enter your note description here" id="floatingTextarea" style="height: 100px;" required></textarea>
            <label for="floatingTextarea">Description</label>
        </div>

        <button type="submit" name="submit" class="btn btn-primary col-md-6">Submit</button>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
