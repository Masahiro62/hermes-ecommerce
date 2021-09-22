<?php
    include 'datafiles.php';
    $user_id=$_GET['user_id'];
    $User=$personObj->getUserInfo($user_id);
    // session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>User Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body{
        /* background-image: url(assets/image/carts.jpg); */
        background-color: whitesmoke;
      }

    </style>
  </head>
  <body>
      <header><?php include 'header.php';?></header>

      <!-- back to dashboarde -->
      <a href="adminDashboard.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>

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
            <div class="card w-50 mx-auto mt-4 border-0 mb-5">
                <div class="card-header bg-white border-0">
                  <h3 class="text-center pt-5">Your Infomation </h3>
                </div>

                <div class="card-body">
                      <!-- aria-describedby="helpId" what the meaning of the code is  -->
                    <form action="" method="post">
                          <input type="text"hidden name="user_id" value="<?php echo $User['user_id']?>">
                          <div class="form-group mt-3">
                            <label for="fullname">FULL NAME:</label>
                            <input type="text" name="u_fullname" value="<?php echo $User['fullname']?>" id="fullname" class="form-control p-2"  >
                          </div>

                          <div class="form-group mt-3">
                            <label for="address">ADDRESS:</label>
                            <input type="text" name="u_address" value="<?php echo $User['address']?>" id="address" class="form-control p-2" >
                          </div>

                          <div class="form-group mt-3">
                            <label for="">CONTACT NUMBER:</label>
                            <input type="tel" name="u_contact_number" value="<?php echo $User['contact_number']?>" id="" class="form-control p-2" >
                          </div>

                          <div class="form-group mt-3">
                            <label for="">E-MAIL:</label>
                            <input type="email" name="u_email" value="<?php echo $User['email']?>" id="" class="form-control p-2" >
                          </div>


                          <div class="form-group mt-3">
                            <label for="">USERNAME:</label>
                            <input type="text" name="u_username" value="<?php echo $User['username']?>" id="" class="form-control" >
                          </div>

                          <div class="row form-group mt-3">
                            <div class="col-md-6">
                              <label for="">PASSWORD:</label>
                              <input type="password" name="u_password"  class="w-100 form-control" required>
                            </div>

                            <div class="col-md-6">
                              <label for="">CONFIRM PASSWORD:</label>
                              <input type="password" name="u_conpassword"  class="w-100 form-control" required> 
                            </div>
                          </div>

                          <div class="form-group mt-3 text-center">
                            <input type="text" hidden value="<?php echo $_SESSION['account_id'];?>" name="account_id">
                            <input type="text" hidden value="<?php echo $User['user_id']?>" name="user_id">
                            <input type="submit" value="UPDATE" name="user_update" class="btn btn-warning">
                
                            <!-- button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?php echo $User['user_id'];?>">
                                DELETE
                            </button>
                            <!-- modal -->
                            <div class="modal fade" id="modal<?php echo $User['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">DELETE</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" value="">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <P class="text-center">Are you sure to delete <strong class="text-denger">Your Account </strong>?</P>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" name="operation_account" value="DELETE" class="btn btn-danger">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                          </div>
                    </form>
                 </div>   
            </div>
      </div>
      </main>
      <!-- have space aside  -->
      <footer>
        <?php include 'footer.php';?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>