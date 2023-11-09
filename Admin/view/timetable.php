<?php
session_start();
include("../../User/db/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | Timetable</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body>

    <!-- header -->
    <?php include('../layouts/header.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">

          <!-- Sidebar -->
          <?php include('../layouts/sidebar.php'); ?>

        </div>
        <div class="col-sm-10 mt-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Time Table</li>
            </ol>
          </nav>
          <div id="Title">
          <h1>Train Timetable</h1>
          <p>Train Timetable - OR2S</p>
          </div>
          
          <!-- Add Button -->
          <button type="button" class="btn btn-success my-3" data-toggle="modal" data-target=".add">+ Add Train Time</button>
          <div id="displayTimetable"></div>

        </div>
      </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade bd-example-modal-lg add" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Train Timetable</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                  <label for="train">Train</label>
                  <?php 
                    $query = "select * from trains";
                    $result = mysqli_query($con,$query);
                  ?>
                  <select id="train" class="form-control" name="id" required>
                    <option value="Select Train" disabled selected></option>
                    <?php 
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['train_num'];?> - <?php echo $row['train_name'];?></option>
                    <?php 
                        }
                    ?>
                  </select>
                    <?php 
                      }
                    ?>
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="from">Source</label>
                  <?php 
                    $query = "SELECT * FROM stops WHERE ord BETWEEN 1 and 27";
                    $from = mysqli_query($con,$query);
                  ?>
                  <select class="form-control" id="from" name="source" required>
                  <option value="" disabled selected></option>
                  <?php 
                    if(mysqli_num_rows($from) > 0){
                      while($row = mysqli_fetch_array($from)){
                  ?>
                    <option value="<?php echo $row['ord'];?>"><?php echo $row['stop_code'];?> - <?php echo $row['stop_name'];?></option>
                  <?php 
                      }
                  ?>
                  </select>
                  <?php 
                    }
                  ?>
                </div>
                <div class="form-group col-md-6">
                  <label for="to">Destination</label>
                  <?php 
                    $query = "SELECT * FROM stops WHERE ord BETWEEN 1 and 27";
                    $to = mysqli_query($con,$query);
                  ?>
                  <select class="form-control" id="to" name="dest" required>
                  <option value="" disabled selected></option>
                  <?php 
                    if(mysqli_num_rows($to) > 0){
                      while($row = mysqli_fetch_array($to)){
                  ?>
                    <option value="<?php echo $row['ord'];?>" ><?php echo $row['stop_code'];?> - <?php echo $row['stop_name'];?></option>
                  <?php 
                      }
                  ?>
                  </select>
                  <?php 
                    }
                  ?>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="dept_time">Depurture Time</label>
                  <input type="time" class="form-control" id="dept_time" name="dept_time" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="duration">Duration</label>
                  <input type="time" class="form-control" id="duration" name="duration" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="arr_time">Arrival Time</label>
                  <input type="time" class="form-control" id="arr_time" name="arr_time" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="dist">Distance</label>
                  <input type="number" class="form-control" id="dist" name="dist" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="days">Running Days</label>
                  <select id="days" class="form-control" name="days" required>
                    <option disabled selected>Select</option>
                    <option value="1">All Day</option>
                    <option value="2">Sunday</option>
                    <option value="3">Monday</option>
                    <option value="4">Tuesday</option>
                    <option value="5">Wednesday</option>
                    <option value="6">Thirsday</option>
                    <option value="7">Friday</option>
                    <option value="8">Saturday</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" onclick="addTrainTime()">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade bd-example-modal-lg update" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update Timetable</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                  <label for="updatetrain">Train</label>
                  <?php 
                    $query = "select * from trains";
                    $result = mysqli_query($con,$query);
                  ?>
                  <select id="updatetrain" class="form-control" name="id">
                    <option value="Select Train" disabled selected></option>
                    <?php 
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['train_num'];?> - <?php echo $row['train_name'];?></option>
                    <?php 
                        }
                    ?>
                  </select>
                    <?php 
                      }
                    ?>
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="updatefrom">Source</label>
                  <?php 
                    $query = "SELECT * FROM stops WHERE ord BETWEEN 1 and 27";
                    $from = mysqli_query($con,$query);
                  ?>
                  <select class="form-control" id="updatefrom" name="source">
                  <option value="" disabled selected></option>
                  <?php 
                    if(mysqli_num_rows($from) > 0){
                      while($row = mysqli_fetch_array($from)){
                  ?>
                    <option value="<?php echo $row['ord'];?>"><?php echo $row['stop_code'];?> - <?php echo $row['stop_name'];?></option>
                  <?php 
                      }
                  ?>
                  </select>
                  <?php 
                    }
                  ?>
                </div>
                <div class="form-group col-md-6">
                  <label for="updateto">Destination</label>
                  <?php 
                    $query = "SELECT * FROM stops WHERE ord BETWEEN 1 and 27";
                    $to = mysqli_query($con,$query);
                  ?>
                  <select class="form-control" id="updateto" name="dest">
                  <option value="" disabled selected></option>
                  <?php 
                    if(mysqli_num_rows($to) > 0){
                      while($row = mysqli_fetch_array($to)){
                  ?>
                    <option value="<?php echo $row['ord'];?>" ><?php echo $row['stop_code'];?> - <?php echo $row['stop_name'];?></option>
                  <?php 
                      }
                  ?>
                  </select>
                  <?php 
                    }
                  ?>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="updatedept">Depurture Time</label>
                  <input type="time" class="form-control" id="updatedept" name="dept_time">
                </div>
                <div class="form-group col-md-4">
                  <label for="updateduration">Duration</label>
                  <input type="time" class="form-control" id="updateduration" name="duration">
                </div>
                <div class="form-group col-md-4">
                  <label for="updatearr">Arrival Time</label>
                  <input type="time" class="form-control" id="updatearr" name="arr_time">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="updatedist">Distance</label>
                  <input type="number" class="form-control" id="updatedist" name="dist">
                </div>
                <div class="form-group col-md-6">
                  <label for="updatedays">Running Days</label>
                  <select id="updatedays" class="form-control" name="days">
                    <option disabled selected>Select</option>
                    <option value="1">All Day</option>
                    <option value="2">Sunday</option>
                    <option value="3">Monday</option>
                    <option value="4">Tuesday</option>
                    <option value="5">Wednesday</option>
                    <option value="6">Thirsday</option>
                    <option value="7">Friday</option>
                    <option value="8">Saturday</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" onclick="updateData()">Update</button>
            <input type="hidden" id="hiddendata"/>
          </div>
        </div>
      </div>
    </div>

    

    <?php include('../layouts/footer.php'); ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/notify.js"></script>               
    <script src="../assets/js/notify.min.js"></script>  

    <script>
      $(document).ready(function(){
        displayData();
      });

      //Display
      function displayData(){
        var displayData="true";
        $.ajax({
          url:"/or2s/Admin/controller/display/displayTimes.php",
          type:"post",
          data:{
            displaySend:displayData
          },
          success:function(data,status){
            $('#displayTimetable').html(data);
          }
        });
      }

      //add
      function addTrainTime() {
        var trainAdd=$('#train').val();
        var sourceAdd=$('#from').val();
        var destAdd=$('#to').val();
        var arriveAdd=$('#arr_time').val();
        var durationAdd=$('#duration').val();
        var deptAdd=$('#dept_time').val();
        var distAdd=$('#dist').val();
        var daysAdd=$('#days').val();

        $.ajax({
          url:"/or2s/Admin/controller/add/addtime.php",
          type: 'post',
          data:{
            train:trainAdd,
            source:sourceAdd,
            dest:destAdd,
            arr:arriveAdd,
            duration:durationAdd,
            dept:deptAdd,
            distance:distAdd,
            days:daysAdd
          },
          success:function(data,status){
            $('#addModal').modal('hide');
            displayData();
          }
        });
        $.notify("Successfully Added!!", "success");
      }

      //Delete
      function deleteData(deleteid){
        $.ajax({
          url:"/or2s/Admin/controller/delete/deleteTime.php",
          type:'post',
          data:{
            deletesend:deleteid
          },
          success:function(data,status){
            displayData();
          }
        });
        $.notify("Successfully Deleted!!", "error");
      }

      //update
      function getData(updateid){
        $('#hiddendata').val(updateid);
        $.post("/or2s/Admin/controller/update/updateTime.php",{updateid:updateid},function(data,status){
          var timeid=JSON.parse(data);
          $('#updatetrain').val(timeid.train_id);
          $('#updatefrom').val(timeid.source);
          $('#updateto').val(timeid.dest);
          $('#updatedept').val(timeid.dept_time);
          $('#updateduration').val(timeid.duration);
          $('#updatearr').val(timeid.arr_time);
          $('#updatedist').val(timeid.dist);
          $('#updatedays').val(timeid.days);
        });
        $('#updateModal').modal("show");
      }

      function updateData(){
        var updatetrain=$('#updatetrain').val();
        var updatefrom=$('#updatefrom').val();
        var updateto=$('#updateto').val();
        var updatedept=$('#updatedept').val();
        var updateduration=$('#updateduration').val();
        var updatearr=$('#updatearr').val();
        var updatedist=$('#updatedist').val();
        var updatedays=$('#updatedays').val();
        var hiddendata=$('#hiddendata').val();

        $.post("/or2s/Admin/controller/update/updateTime.php",{
          updatetrain:updatetrain,
          updatefrom:updatefrom,
          updateto:updateto,
          updatedept:updatedept,
          updateduration:updateduration,
          updatearr:updatearr,
          updatedist:updatedist,
          updatedays:updatedays,
          hiddendata:hiddendata,
        },function(data,status){
          $('#updateModal').modal('hide');
          displayData();
        });
        $.notify("Successfully Updated!!", "warn");
      }
    </script>
  </body>
</html>

