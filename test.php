<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DataTable Test</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/6W1z3qW3z0BB8nQ2cRX+Q1G7e8pM6wQow4X6bZ" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.7/js/jquery.dataTables.min.js"></script>
</head>
<body>

<table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Sno</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Test Title 1</td>
            <td>Description 1</td>
        </tr>
        <!-- More rows... -->
    </tbody>
</table>


<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>

</body>
</html>
