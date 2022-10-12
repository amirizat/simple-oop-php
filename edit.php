<?php

// Include database file
include 'database.php';

$customerObj = new database();
$customer = "";
$labelname = "";
$labelemail = "";
$labelid = "";
// Edit customer record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $customerObj->displayData($editId);
    $labelname = $customer['fname'];
    $labelemail = $customer['email'];;
    $labelid = $customer['id'];;
}

// Update Record in customer table
if (isset($_POST['update'])) {
    $name = $customerObj->filter($_POST['fname']);
    $email = $customerObj->filter($_POST['email']);
    $id = $customerObj->filter($_POST['id']);

    $customerObj->updateData($name, $email, $id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP OOP CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

    <div class="card text-center" style="padding:15px;">
        <h4>PHP OOP CRUD</h4>
    </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Update Records</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form action="edit.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $labelname; ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $labelemail; ?>" required="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $labelid; ?>">
                                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>