<?php

include 'database.php';

$userObj = new database();

// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $userObj->deleteData($deleteId);
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
    </div><br><br>

    <div class="container">
        <?php
        if (isset($_GET['msg2']) == "update") {
            echo "<div class='alert alert-success alert-dismissible'>
              Your Registration updated successfully
            </div>";
        }
        if (isset($_GET['msg3']) == "delete") {
            echo "<div class='alert alert-success alert-dismissible'>
              Record deleted successfully
            </div>";
        }
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user = $userObj->displayAllData();
                foreach ($user as $users) {
                ?>
                    <tr>
                        <td><?php echo $users['id'] ?></td>
                        <td><?php echo $users['fname'] ?></td>
                        <td><?php echo $users['email'] ?></td>
                        <td>
                            <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $users['id'] ?>">
                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
                            <button class="btn btn-danger"><a href="displaydata.php?deleteId=<?php echo $users['id'] ?>" onclick="return myConfirm();">
                                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                </a></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
<script>
    function myConfirm() {
        var result = confirm("Want to delete?");
        if (result == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>