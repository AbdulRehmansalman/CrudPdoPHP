<?php
include 'dbclass.php';

if (isset($_POST['submit'])) {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $PdoQuery = "INSERT INTO pdodb (name, email ,password) VALUES(:name, :email ,:password)";
        $PdoResult = $dbcon->prepare($PdoQuery);

        $PdoExecute = $PdoResult->execute([':name' => $name, ':email' => $email, ':password' => $password]);
        echo $PdoResult->rowCount() . "Row Inserted";

        if ($PdoExecute) {
            echo '<script type="text/javascript">';
            echo ' alert("Added succesfully")';  //not showing an alert box.
            echo '</script>';
            header('location:index.php');
        } else {
            echo "Failed";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
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
    <h1 class="text-center" >Insert Record: </h1>
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
                    <button type="submit" class="btn btn-danger text my-4" name="submit">Submit</button>
                </div>
            </div>
        </form>

</body>

</html>