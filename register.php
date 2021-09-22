<?php
  include "datafiles.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <main>
        <div class="btn me-5 mt-3 text-center" onclick="history.back()"><span>>>>BACK</span></div>
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
            <div class="card w-50 mx-auto mt-4 border-0">
                <div class="card-header bg-white border-0">
                  <h3 class="text-center">RAGISTRATION</h3>
                </div>

                <div class="card-body">
                      <!-- aria-describedby="helpId" what the meaning of the code is  -->
                    <form action="" method="post">
                          <div class="form-group mt-3">
                            <label for="fullname">FULL NAME</label>
                            <input type="text" name="fullname" id="fullname" class="form-control p-2" placeholder="EX: Taro Tanaka" required >
                          </div>

                          <div class="form-group mt-3">
                            <label for="address">ADDRESS</label>
                            <input type="text" name="address" id="address" class="form-control p-2" placeholder="Fill in your Address" required>
                          </div>

                          <div class="form-group mt-3">
                            <label for="">CONTACT NUMBER</label>
                            <input type="tel" name="contact_number" id="" class="form-control p-2" placeholder="Fill in your Phone Number" required>
                          </div>

                          <div class="form-group mt-3">
                            <label for="">E-MAIL</label>
                            <input type="email" name="email" id="" class="form-control p-2" placeholder="Fill in your E-MAIL" required>
                          </div>


                          <div class="form-group mt-3">
                            <label for="">USERNAME</label>
                            <input type="text" name="username" id="" class="form-control" placeholder="Fill in your Username" required>
                          </div>

                          <div class="row form-group mt-3">
                            <div class="col-md-6">
                              <label for="">PASSWORD</label>
                              <input type="password" name="password" class="w-100" required>
                            </div>

                            <div class="col-md-6">
                              <label for="">CONFIRM PASSWORD</label>
                              <input type="password" name="con-password" class="w-100" required> 
                            </div>
                          </div>

                              <!-- chage colspan and whne you click it then show password area -->
                          <div class="form-group mt-2">
                            <!-- <span>Are you a new staff?</span>
                            <br>
                            <input type="radio" value="yes" name="staff" id="yes" disabled>
                            <label for="yes">Yes, I am.</label>
                            <br>
                            <input type="radio" value="no" name="staff" id="no" checked>
                            <label for="no" checked>No, I am not.</label> -->
                            <p>
                              <button class="btn border" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseArea">
                              STAFF?
                              </button>
                            </p>
                            <div class="collapse" id="collapse">
                              <div class="card card-body">
                                <p>If you are a staff, please enter staff password</p>
                                <input type="password" name="staffPassword" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="form-group mt-3 text-center">
                            <input type="submit" value="SUBMIT" name="register" class="btn btn-primary">
                          </div>
                    </form>
                </div>

                <div class="card-footer text-center border-0 bg-white">
                  <hr>
                  <p class="mt-3 text-secondary" style="font-size:small;">
                  Do you already have your account?
                  <br>
                    -><a href="login.php">LOGIN</a>
                  </p>

                </div>
            </div>
          </div>   
      </main>
    <footer>
      <br>
      <br>
      <br>
      <?php include 'footer.php'?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8da6dac468.js" crossorigin="anonymous"></script>

  </body>
</html>