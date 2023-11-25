<?php
include 'dbclass.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION </title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container my-4">
        <h1 class="text-center" >Display All Records: </h1>
        <button class="btn btn-info my-3 text-right">
             <a href="add.php" class="text-light">Add User</a>
        </button>

        <table class="table table-hover">
            <thead>
                <tr class="table-primary mb-3">
                    <th class="table-info text-center" scope="col">ID No</th>
                    <th class="table-info text-center" scope="col">Name</th>
                    <th class="table-info text-center" scope="col">Email</th>
                    <th class="table-info text-center" scope="col">Password</th>
                    <th class="table-info text-center" class="ml-7" scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- the data given below will be shown to our website display-->
                <?php
                $sql = "select * from pdodb";
                $stmt = $dbcon->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    //! -> operator is not used because it is used with Objects Not Arrays.
                    $Id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $password = $row['password'];
                    echo
                    '<tr  class="table-primary">
          <th class="text-center" scope="row">' . $Id . '</th>
          <td class="text-center">' . $name . '</td>
          <td class="text-center">' . $email . '</td>
          <td class="text-center">' . $password . '</td>
          <td class="text-center">
          <button class="btn btn-outline-dark"> <a href="edit.php?
          updateid=' . $Id . '" class="text-light">Update</a> </button>
          <button class="btn btn-outline-danger">  <a href="action.php?
          deleteid=' . $Id . '" class="text-light">Delete</a> </button>
          <button class="btn btn-outline-success my-2">
             <a href="add.php" class="text-light">Add User</a>
        </button>
        </td>
          
        </tr>';
                }


                ?>
            </tbody>
        </table>
    </div>

</body>

</html>