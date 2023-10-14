<?php
include('connection.php');

$sql = "SELECT * FROM contact_form";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact |</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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

  <style>
          header {
            background-color:#512a10;
        } 
  .link-muted { color: #aaa; } .link-muted:hover { color: #1266f1; }
  .text-sli{color:green}
  .red { color:red}

</style>
<body>
    <!-- Your HTML content here -->




    <?php
include('connection.php');
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
  // If the user is not logged in or not an admin, display an error message
  echo "Access Denied. You do not have permission to access this page.";
  header("Location: /projaa/index.php"); // Redirect to client 
  exit();
}

$sql = "SELECT * FROM contact_form";
$result = mysqli_query($con, $sql);
?>
<?php
            require 'header.php';
           ?>

<section >
    <div class="container my-5 py-5">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $statusBadge = '';
            if ($row['status'] == 'Pending') {
                $statusBadge = 'bg-primary';
            } elseif ($row['status'] == 'Approved') {
                $statusBadge = 'bg-success';
            } elseif ($row['status'] == 'Rejected') {
                $statusBadge = 'bg-danger';
            }
            // Format the created_at date
            $formattedDate = date("F d, Y", strtotime($row['created_at']));
            ?>
            <div class="card text-dark mb-3">
                <div class="card-body p-4">
                    <h4 class="mb-0">Recent comments</h4>
                    <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

                    <div class="d-flex flex-start">
                        <img class="rounded-circle shadow-1-strong me-3"
                            src="../images/personne.png" alt="avatar" width="60"
                            height="60" />
                        <div>
                            <h6 class="fw-bold mb-1"><?= $row['name'] ?></h6>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                    <?= $formattedDate ?>
                                    <span class="badge <?= $statusBadge ?>"><?= $row['status'] ?></span>
                                </p>
                                
  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="text-sli"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="red"><i class="fas fa-heart ms-2"></i></a>
                            </div>
                            <p class="mb-0">
                                <?= $row['message'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
            </div>
        <?php } ?>
    </div>
</section>
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
    <!-- Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

<?php
function getStatusBadgeClass($status)
{
    switch ($status) {
        case 'Pending':
            return 'bg-primary';
        case 'Approved':
            return 'bg-success';
        case 'Rejected':
            return 'bg-danger';
        default:
            return 'bg-secondary';
    }
}
?>
