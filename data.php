<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>

<?php
include 'conn.php'; // Include database connection

// Handle form submission for editing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['snoEdit'])) {
    $sno = $_POST['snoEdit'];
    $title = $_POST['titleEdit'];
    $description = $_POST['descriptionEdit'];
    $sql = "UPDATE `crud` SET `title` = '$title', `description` = '$description' WHERE `sno` = '$sno'";
    mysqli_query($conn, $sql);
    
    // Redirect to avoid resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Check if an edit action was requested
$editRow = null;
if (isset($_GET['edit'])) {
    $snoToEdit = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM `crud` WHERE `sno` = '$snoToEdit'");
    $editRow = mysqli_fetch_assoc($result);
}
?>

<div class="container">
    <h2 class="text-center mb-4">Manage Notes</h2>
    <table class="table table-striped table-bordered" id="myTable">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `crud`");
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $sno++;
                echo "<tr>
                    <td>$sno</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='?edit={$row['sno']}' class='btn btn-sm btn-primary'>Edit</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<?php if ($editRow): ?>
<div class="modal fade show" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit this Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="snoEdit" value="<?php echo $editRow['sno']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Note Title</label>
                        <input type="text" class="form-control" name="titleEdit" value="<?php echo $editRow['title']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Note Description</label>
                        <textarea class="form-control" name="descriptionEdit" rows="3" required><?php echo $editRow['description']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
