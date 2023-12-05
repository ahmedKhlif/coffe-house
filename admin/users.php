<?php
include('connection.php');
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
  // If the user is not logged in or not an admin, display an error message
  echo "Access Denied. You do not have permission to access this page.";
  header("Location: /projaa/index.php"); // Redirect to client 
  exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<head>
<link rel="shortcut icon" href="images/coffee.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script defer src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- xlsx library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <style>
          header {
            background-color:#512a10;
        } 
    body {
      color: #566787;
      background: #f5f5f5;
      font-family: 'Varela Round', sans-serif;
      font-size: 13px;
    }

    .table-responsive {
      margin: 30px 0;
    }

    .table-wrapper {
      min-width: 1000px;
      background: #fff;
      padding: 20px 25px;
      border-radius: 3px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
      padding-bottom: 15px;
      background: #299be4;
      color: #fff;
      padding: 16px 30px;
      margin: -20px -25px 10px;
      border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
      margin: 5px 0 0;
      font-size: 24px;
    }

    .table-title .btn {
      color: #566787;
      float: right;
      font-size: 13px;
      background: #fff;
      border: none;
      min-width: 50px;
      border-radius: 2px;
      border: none;
      outline: none !important;
      margin-left: 10px;
    }

    .table-title .btn:hover,
    .table-title .btn:focus {
      color: #566787;
      background: #f2f2f2;
    }

    .table-title .btn i {
      float: left;
      font-size: 21px;
      margin-right: 5px;
    }

    .table-title .btn span {
      float: left;
      margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
      border-color: #e9e9e9;
      padding: 12px 15px;
      vertical-align: middle;
    }

    table.table tr th:first-child {
      width: 60px;
    }

    table.table tr th:last-child {
      width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
      background: #f5f5f5;
    }

    table.table th i {
      font-size: 13px;
      margin: 0 5px;
      cursor: pointer;
    }

    table.table td:last-child i {
      opacity: 0.9;
      font-size: 22px;
      margin: 0 5px;
    }

    table.table td a {
      font-weight: bold;
      color: #566787;
      display: inline-block;
      text-decoration: none;
    }

    table.table td a:hover {
      color: #2196F3;
    }

    table.table td a.settings {
      color: #2196F3;
    }

    table.table td a.delete {
      color: #F44336;
    }

    table.table td i {
      font-size: 19px;
    }

    table.table .avatar {
      border-radius: 50%;
      vertical-align: middle;
      margin-right: 10px;
    }

    .status {
      font-size: 30px;
      margin: 2px 2px 0 0;
      display: inline-block;
      vertical-align: middle;
      line-height: 10px;
    }

    .text-success {
      color: #10c469;
    }

    .text-info {
      color: #62c9e8;
    }

    .text-warning {
      color: #FFC107;
    }

    .text-danger {
      color: #ff5b5b;
    }

    .pagination {
      float: right;
      margin: 0 0 5px;
    }

    .pagination li a {
      border: none;
      font-size: 13px;
      min-width: 30px;
      min-height: 30px;
      color: #999;
      margin: 0 2px;
      line-height: 30px;
      border-radius: 2px !important;
      text-align: center;
      padding: 0 6px;
    }

    .pagination li a:hover {
      color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
      background: #03A9F4;
    }

    .pagination li.active a:hover {
      background: #0397d6;
    }

    .pagination li.disabled i {
      color: #ccc;
    }

    .pagination li i {
      font-size: 16px;
      padding-top: 6px
    }

    .hint-text {
      float: left;
      margin-top: 10px;
      font-size: 13px;
    }
  </style>
 <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            // Enable table export
            $("#exportBtn").on('click', function () {
                exportToExcel();
            });

            function exportToExcel() {
                const table = document.getElementById('userTable');
                const ws = XLSX.utils.table_to_sheet(table);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                XLSX.writeFile(wb, 'user_data.xlsx');
            }
        });
    </script>
</head>

<body>

    <?php
    require 'header.php';
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <!-- Add New User and Export to Excel buttons -->
                            <button class="btn btn-success" id="exportBtn">Export to Excel</button>
                        </div>
          </div>
        </div>
        <table class="table table-striped table-hover" id="userTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Date Created</th>
              <th>last seen</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require('connection.php');

          $records_per_page = 6;
          $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
          $start_from = ($page - 1) * $records_per_page;
          
          $sql = "SELECT `id`, `name`, `date_created`,`last_login`, `role`, `status` FROM `users` LIMIT $start_from, $records_per_page";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['date_created']}</td>";
            echo "<td>{$row['last_login']}</td>";
            echo "<td>{$row['role']}</td>";
        
            // Conditionally set the status display based on the 'status' column value
            if ($row['status'] === 'active') {
                echo "<td><span class='status text-success'>&bull;</span> Active</td>";
            } else {
                echo "<td><span class='status text-warning'>&bull;</span> Inactive</td>";
            }
        
            echo "<td>";
            echo "<a href='user_details.php?id={$row['id']}' class='settings' title='Settings' data-toggle='tooltip'><i class='material-icons'>&#xE8B8;</i></a>";
            echo "<a href='delete_user.php?id={$row['id']}' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a>";
            echo "</td>";
            echo "</tr>";
        }
        
        // Pagination logic
        $total_pages_query = "SELECT COUNT(*) FROM `users`";
        $total_pages_result = mysqli_query($con, $total_pages_query);
        $total_records = mysqli_fetch_array($total_pages_result)[0];
        $total_pages = ceil($total_records / $records_per_page);
        
        // Previous and Next buttons with Bootstrap styles
        echo "<div class='container mt-4'><ul class='pagination justify-content-center'>";
        if ($page > 1) {
            echo "<li class='page-item'><a class='page-link' href='users.php?page=".($page - 1)."'>Previous</a></li>";
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<li class='page-item'><a class='page-link' href='users.php?page=".$i."'>".$i."</a></li>";
        }
        if ($page < $total_pages) {
            echo "<li class='page-item'><a class='page-link' href='users.php?page=".($page + 1)."'>Next</a></li>";
        }
        echo "</ul></div>";
        ?>
          </tbody>
        </table>
        <!-- Pagination and entry count -->
        <!-- ... -->
      </div>
    </div>
  </div>
  <footer style="background-color:#512a10;">
            <div class="container" style="color:#512a10;font-size: 80px; padding: 80px 0;" align="center">
                <a style="color:white ;" href="#" class="fab fa-facebook-f"></a>
                <a style="color:white ;" href="#" class="fab fa-linkedin"></a>
                <a style="color:white ;" href="#" class="fab fa-twitter"></a>
                <a style="color:white ;" href="#" class="fab fa-github"></a>
            </div>
            <div>
                <p style="color: black; padding: 15px 0;" align="center">
                    &copy; 2023 Copyright: <a style="color:white ;"  href="#">ahmed Khlif  | all rights reserved! </a>
                </p>
            </div>
        </footer>
        <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            // Enable table export
            $("#userTable").tableExport({
                formats: ["xlsx"],
                fileName: "user_data",
                bootstrap: false,
                position: "top",
                ignoreRows: null,
                ignoreCols: null,
                ignoreCSS: ".tableexport-ignore",
            });
        });
    </script>
</body>

</html>