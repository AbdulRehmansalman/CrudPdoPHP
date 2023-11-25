<?php
include 'dbclass.php';
//todo BY USING GET WE WILL ACCESS THE VARIABLE, PARAMETERS
if (isset($_GET['deleteid'])) {
    try {
        $Id = $_GET['deleteid'];
        //todo DELETE QUERY: By Positional parameter
        $id = $Id;
        $deleteQuery = "delete from pdodb where id=?";
        $stmt = $dbcon->prepare($deleteQuery);
 //? execute the statement, sending all the actual values to execute() in the form of array.
        $result = $stmt->execute([$id]);
        if ($stmt) {
            header('location:index.php');

            echo
            '<script type="text/javascript">
            window.onload = function () { 
                alert("Welcome at c-sharpcorner.com."); 
            }
            </script>';
        } else {
            echo "Not Deleted";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
