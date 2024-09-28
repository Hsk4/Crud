<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  

</head>

<body>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include 'partials/navbar.php'; ?>

<div class="container my-5">
    <table class="table mx-auto" id="myTable" style="max-width: 1000px;">
        <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'conn.php';
            $sql = "SELECT * FROM `crud`";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
                        <th scope='row'>".$sno."</th>
                        <td>".$row['title']."</td>
                        <td>".$row['description']."</td>
                        <td>
                            <a href='edit.php?id=".$row['sno']."' class='btn btn-warning btn-sm'>Edit</a>
                            <a class ='edit' href='delete.php?id=".$row['sno']."' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    const edits = document.getElementsByClassName('edit'); // Get all elements with the class 'edit'
    
    // Convert the HTMLCollection to an array and iterate over each element
    Array.from(edits).forEach(element => {
        element.addEventListener("click", (e) => {
            console.log("edit", e);
            // You can handle the edit logic here
        });
    });
</script>
</body>
</html>
