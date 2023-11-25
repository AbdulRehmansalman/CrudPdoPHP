<?php
include 'dbclass.php';

 $Id = $_GET['updateid'];
//* By Positional Parameter;
// $sql = "Select * from pdodb where id=?";
// $stmt = $dbcon->prepare($sql);
// $stmt->execute(['id']);
// $row = $stmt->fetch();
//     //! -> operator is not used because it is used with Objects Not Arrays.
//     $name = $row['name'];
//     $email = $row['email'];
//     $password = $row['password'];

if (isset($_POST['submit'])) { //todo FOR STORING DATA IN DATABASE
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id=$Id;
    //? Updating Query with Positional placeholders:
    $sql = "UPDATE pdodb set name=:name,email=:email,password=:password WHERE id=:id";
    //* replace all actual values with placeholders

    $stmt = $dbcon->prepare($sql);
    //* execute the statement, sending all the actual values to execute() in the form of array.

    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password, 'id' => $id]);
    if ($stmt) {
        // todo echo "Data updated successfully";
        header('location:index.php');
?>
        <script>
            alert("The record at Index NO IS Updated:");
        </script> 
<?php
    } else {
        echo " Updated Unsuccesfully";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href=" bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>PDO CRUD</title>
</head>

<body>
    <div class="container col-md-7 my-4 pt-6" style="background-color:#4893d3;">
        <h1 class="text-center">Update Record: </h1>
        <form method="POST">

            <div class="form-group mb-3">
                <label class="mb-2 fw-bold">Name:</label>
                <input type="text" class="form-control fw-bold text-white bg-dark" style="background-color:#4885d3;" placeholder="Enter your name" name="name" autocomplete="off">
            </div>

            <div class="form-group mb-3">
                <label class="mb-2 fw-bold">Email:</label>
                <input type="text" class="form-control fw-bold text-white bg-dark " style="background-color:#4885d3;" placeholder="Enter your email" name="email" autocomplete="off">
            </div>


            <div class="form-group mb-3">
                <label class="mb-2 fw-bold">Password:</label>
                <input type="text" class="form-control fw-bold text-white bg-dark" style="background-color:#4885d3;" placeholder="Enter your mobile number" name="password" autocomplete="off">
            </div>

            <div class="container" style="background-color:#4893d3;">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-danger text my-4" name="submit">Update</button>

                </div>
            </div>
        </form>

</body>

</html>