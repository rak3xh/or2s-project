<?php

include("../../../User/db/connection.php");

if(isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];

    $query = "DELETE FROM timetable WHERE id=$unique";

    $result = mysqli_query($con, $query);
}

?>