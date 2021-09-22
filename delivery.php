<!doctype html>
<html lang="en">
  <head>
    <title>Delivery page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <header><?php include 'header.php';?></header>
      <?php include 'datafiles.php';?>
        <!-- back to dashboarde -->
        <a href="adminDashboard.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>
      
      <!-- just delivery list  -->
      <main>
        <div class="container-fluid">
            <div class="w-50 mx-auto mt-5 text-center">
                <?php 
                    if(isset($_GET["success"]) && isset($_GET["message"]))
                    {
                        $success = $_GET["success"];
                        $message = $_GET["message"];
                        $class = ($success == 1)?"success":"danger";
    
                        echo "<div class='alert alert-$class' role='alert'>";
                        echo $message;
                        echo "</div>";
                    }
                ?>
            </div>
            <div class="card w-50 mx-auto mt-5 mb-5">
                <div class="card-header">
                    <h3 class="text-center">DELIVERY LIST</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <th>DELIVERY ID</th>
                            <th>FULLNAME(USERNAME)</th>
                            <th>STATUS</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                              $displayDeli=$personObj->displayDeliveryTable();
                              if($displayDeli==false){
                            ?>

                              <td colspan="4" class="text-danger">No Record Found</td>
                            <?php
                              }else{
                                foreach($displayDeli as $Deli){
                            ?>
                            <tr>
                              <td><?php echo $Deli['delivery_id'];?></td>
                              <td><?php echo $Deli['fullname'];?> (<?php echo $Deli['username'];?>)</td>
                              <form action="" method="POST">
                                  <input type="text" name="delivery_id" value="<?php echo $Deli['delivery_id'];?>" hidden>
                                  <td>
                                    <select name="u_status" id="status" class="form-control">
                                      <option value="<?php echo $Deli['delivery_status'];?>" selected><?php echo $Deli['delivery_status'];?></option>
                                      <?php 
                                        if($Deli['delivery_status']=="pending"){
                                      ?>
                                        <option value="deliverying">delivering</option>
                                        <option value="delivered">delivered</option>
                                      <?php
                                        }elseif($Deli['delivery_status']=="deliverying"){
                                      ?>
                                        <option value="pending">pending</option>
                                        <option value="delivered">delivered</option>
                                      <?php
                                        }else{
                                      ?>
                                        <option value="pending">pending</option>
                                      <option value="deliverying">delivering</option>
                                      <?php
                                        }
                                      ?>
                                      <!-- <option value="pedding">pending</option>
                                      <option value="deliverying">delivering</option>
                                      <option value="delivered">delivered</option> -->
                                    </select>
                                  </td>
                                  <td class=""><input type="submit" name="change_status" value="CHANGE" class="form-control btn btn-warning" ></td>
                              </form>
                            </tr>
                            <?php
                                  }
                               }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </main>
      <footer><?php include 'footer.php';?></footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>