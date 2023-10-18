<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table with Custom Search Bar Only</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <!-- Your Bootstrap table goes here -->
    <table id="myTable" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <!-- Add more table rows as needed -->
            </tr>
        </tbody>
    </table>

    <!-- Include jQuery and DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- Your custom JavaScript code goes here -->

    <script>

$(document).ready(function() {
    // Initialize DataTable with only the search bar
    $('#myTable').DataTable({
        "paging": false, // Hide the pagination controls
        "searching": true, // Show the search bar
    });

    // Customize the search bar's border color to red and add margin
    var searchBar = $('#myTable_filter input[type="search"]');
    searchBar.css('border', '1px solid red');
    searchBar.css('margin-bottom', '10px'); // Adjust margin as needed
});




    </script>




</body>
</html>
