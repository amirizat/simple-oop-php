<?php

// Include database file
include 'database.php';

$dbase = new database();

// Insert Record in customer table
if (isset($_POST['submit'])) {

    if (!empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $fname = $dbase->filter($_POST['fname']);
        $email = $dbase->filter($_POST['email']);
        $password = $dbase->filter($_POST['password']);
    } else {
        echo "<script>alert('Error');</script>";
    }

    $dbase->insertUser($fname, $email, $password);

    if ($dbase->getResult() == TRUE) {
        echo "<script>alert('Successful Register');document.location='displaydata.php'</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP OOP CRUD </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

    <div class="card text-center" style="padding:15px;">
        <h4>PHP CRUD OOP</h4>
    </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form action="add.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter name" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
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