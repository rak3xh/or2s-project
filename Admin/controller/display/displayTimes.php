<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<?php 

include("../../../User/db/connection.php");

if(isset($_POST['displaySend'])){
    $table='<div class="table-responsive"><table 
    class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sl.No.</th>
        <th scope="col">Train Number</th>
        <th scope="col">Train Name</th>
        <th scope="col">Source</th>
        <th scope="col">Destination</th>
        <th scope="col">Depurture Time</th>
        <th scope="col">Duration</th>
        <th scope="col">Arrival Time</th>
        <th scope="col">Distance(KM)</th>
        <th scope="col">Running Day(s)</th>
        <th scope="col" colspan=2>Action</th>
      </tr>
    </thead>';

    $query = "select * from trains join timetable on trains.id=timetable.train_id";
    $result = mysqli_query($con, $query);
    $number=1;
    while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $train_id=$row['train_id'];
        $source=$row['source'];
        $dest=$row['dest'];
        $arr_time=$row['arr_time'];
        $duration=$row['duration'];
        $dept_time=$row['dept_time'];
        $distance=$row['dist'];
        $days=$row['days'];

        if($source == 1){
          $source = "ADRA - Adra Junction";
        }else if($source == 2){
          $source = "IBL - Indrabil";
        }else if($source == 3){
          $source = "SRJM - Sirjam";
        }else if($source == 4){
          $source = "JPH - Jhantipahari";
        }else if($source == 5){
          $source = "CJN - Chhatna";
        }else if($source == 6){
          $source = "BQA - Bankura Junction";
        }else if($source == 7){
          $source = "BXL - Bheduasol";
        }else if($source == 8){
          $source = "ODM - Ondagram";
        }else if($source == 9){
          $source = "RSG - Ramsagar";
        }else if($source == 10){
          $source = "VSU - Bishnupur Junction";
        }else if($source == 11){
          $source = "PBA - Piardoba";
        }else if($source == 12){
          $source = "BGO - Bogri Road";
        }else if($source == 13){
          $source = "CBA - Garhbeta";
        }else if($source == 14){
          $source = "CDGR - Chandrakona Road";
        }else if($source == 15){
          $source = "SLB - Salboni";
        }else if($source == 16){
          $source = "MDN - Midnapore";
        }else if($source == 17){
          $source = "GKL - Gokulpur";
        }else if($source == 18){
          $source = "GMDN - Girimaidam";
        }else if($source == 19){
          $source = "KGP - Kharagpur Junction";
        }else if($source == 20){
          $source = "TATA - Tatanagar Junction";
        }else if($source == 21){
          $source = "CKP - Chakradharpur Junction";
        }else if($source == 22){
          $source = "SNTD - Santaldih";
        }else if($source == 23){
          $source = "MHQ - Mahuda Junction";
        }else if($source == 24){
          $source = "BKSC - Bokaro Steel City";
        }else if($source == 25){
          $source = "JAA - Jhalida";
        }else if($source == 26){
          $source = "MURI - Muri Junction";
        }else if($source == 27){
          $source = "RNC - Ranchi Junction";
        }

        if($dest == 1){
          $dest = "ADRA - Adra Junction";
        }else if($dest == 2){
          $dest = "IBL - Indrabil";
        }else if($dest == 3){
          $dest = "SRJM - Sirjam";
        }else if($dest == 4){
          $dest = "JPH - Jhantipahari";
        }else if($dest == 5){
          $dest = "CJN - Chhatna";
        }else if($dest == 6){
          $dest = "BQA - Bankura Junction";
        }else if($dest == 7){
          $dest = "BXL - Bheduasol";
        }else if($dest == 8){
          $dest = "ODM - Ondagram";
        }else if($dest == 9){
          $dest = "RSG - Ramsagar";
        }else if($dest == 10){
          $dest = "VSU - Bishnupur Junction";
        }else if($dest == 11){
          $dest = "PBA - Piardoba";
        }else if($dest == 12){
          $dest = "BGO - Bogri Road";
        }else if($dest == 13){
          $dest = "CBA - Garhbeta";
        }else if($dest == 14){
          $dest = "CDGR - Chandrakona Road";
        }else if($dest == 15){
          $dest = "SLB - Salboni";
        }else if($dest == 16){
          $dest = "MDN - Midnapore";
        }else if($dest == 17){
          $dest = "GKL - Gokulpur";
        }else if($dest == 18){
          $dest = "GMDN - Girimaidam";
        }else if($dest == 19){
          $dest = "KGP - Kharagpur Junction";
        }else if($dest == 20){
          $dest = "TATA - Tatanagar Junction";
        }else if($dest == 21){
          $dest = "CKP - Chakradharpur Junction";
        }else if($dest == 22){
          $dest = "SNTD - Santaldih";
        }else if($dest == 23){
          $dest = "MHQ - Mahuda Junction";
        }else if($dest == 24){
          $dest = "BKSC - Bokaro Steel City";
        }else if($dest == 25){
          $dest = "JAA - Jhalida";
        }else if($dest == 26){
          $dest = "MURI - Muri Junction";
        }else if($dest == 27){
          $dest = "RNC - Ranchi Junction";
        }

        if($days == 1){
          $days = "All Days";
        }else if($days == 2){
          $days = "Sunday";
        }else if($days == 3){
          $days = "Monday";
        }else if($days == 4){
          $days = "Tuesday";
        }else if($days == 5){
          $days = "Wednesday";
        }else if($days == 6){
          $days = "Thirsday";
        }else if($days == 7){
          $days = "Friday";
        }else{
          $days = "Saturday";
        }

        $table.='<tr>
        <td scope="row">'.$number.'</td>
        <td>'.$row['train_num'].'</td>
        <td>'.$row['train_name'].'</td>
        <td>'.$source.'</td>
        <td>'.$dest.'</td>
        <td>'.date('H:i',strtotime($dept_time)).'</td>
        <td>'.date('H:i',strtotime($duration)).'</td>
        <td>'.date('H:i',strtotime($arr_time)).'</td>
        <td>'.$distance.' KM'.'</td>
        <td>'.$days.'</td>
        <td>
            <button class="btn btn-warning" onclick="getData('.$id.')">Update</button>
        </td>
        <td>
            <button class="btn btn-danger" onclick="deleteData('.$id.')">Delete</button>
        </td>
    </tr>';
    $number++;
    }
    $table.='</table></div>';
    echo $table;
}
?>
