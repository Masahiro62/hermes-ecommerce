<!doctype html>
<html lang="en">
  <head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <header></header>
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
            <div class="card w-50 mt-5 p-5 mx-auto border-0">
                <div class="card-head ">
                    <h1 class="text-center">LOGIN</h1>
                </div>
                    <div class="card-body">                
                        <form action="datafiles.php" method="post">
                            <div class="row form-group p-0 ">
                                <!-- <label for="username form-label">USERNAME</label> -->
                                <input type="text" name="username" class="form-control p-3" placeholder="USERNAME" required>
                            </div>

                            <div class="row form-group p-0 mt-2">
                                <!-- <label for="passsword">PASSWORD</label> -->
                                <input type="password" name="password" class="form-control p-3" placeholder="PASSWORD" required>
                            </div> 

                            <div class="form-group text-center">
                                <input type="submit" name="login" value="ENTER" class="btn btn-success mb-5 mt-3">
                            </div>

                        </form>
                    </div>

                    <div class="card-footer text-center border-0 bg-white">
                        <hr>
                        <p class="mt-3 text-secondary" style="font-size:small;">
                            If you don't have any accounts, please register first.
                            <br>
                            -><a href="register.php">REGISTER</a>
                        </p>
                        <hr>
                        <p class="mt-3 text-secondary" style="font-size:small;">
                            If there are soome problems, please contact us.
                            <br>
                            -><a href="contact.php">CONTACT</a>
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
  </body>
</html>
