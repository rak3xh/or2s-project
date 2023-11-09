<?php

include("../db/connection.php");

if(isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];

    $query = "DELETE FROM passengers WHERE id=$unique";

    $result = mysqli_query($con, $query);
}

?>