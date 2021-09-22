<?php
        include 'datafiles.php'; 
        $item_id=$_GET['item_id'];
        //$Item=$personObj->picSpecificItem($item_id);
        $Item=$personObj->specificItem($item_id);

        // for pic
        $directory='uploads/item_pictures/';
        $image=$Item['item_image'];
        $src=$directory.$image;
?>

<!doctype html>
<html lang="en">
  <head>
    <title>purchase page</title>
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
      <a href="userDashboard.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>
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
                <div class="card-header"style="background-color: white;">
                    <h3 class="text-center">ORDER FORM</h3>
                </div>
                <div class="card-body">
                    <!-- input the data how many... -->
                    <form action="" method="POST">
                        <table class="w-50 mx-auto mt-3">
                            <tbody class="">
                                <tr class="">
                                    <td colspan="2">
                                        <h4 class="text-center"><?php echo $Item['item_name'];?></h4>
                                        <img src="<?php echo $src?>" alt="<?php echo $Item['item_name'];?>" class="img-fluid mb-5" style="height: 300px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">PRICE:</label></td>
                                    <td><input type="number" name="item_price" class="form-control" value="<?php echo $Item['item_price'];?>" readonly><td>
                                </tr>
                                <tr>
                                    <td>STOCKS:</td>
                                    <td><input type="number" class="form-control" value="<?php echo $Item['item_stocks'];?>" name="stock" id=""readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="">QUANTITY:</label></td>
                                    <td><input type="number" name="quantity" class="form-control" min="1" required></td>
                                </tr>
                                <tr class="">
                                    <td colspan="2" class="text-center pt-3">
                                        <input type="submit" name="cal_item" value="CALCULATE" class="btn btn-secondary w-50 form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- calc with php and shpow and put the button buy now  -->
                    <?php
                        
                        $quantity= isset($_POST['quantity'])?$_POST['quantity']:0;
                        $item_price= isset($_POST['item_price'])?$_POST['item_price']:$Item['item_price'];
                        $cal_price = $personObj->calItem($quantity,$item_price);
                        
                        if($Item['item_stocks']<$quantity){
                           
                    ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <h2 class="font-weight-blod">INSUFFICIENT STOCKS</h2>
                        </div>
                    <?php
                        }else{
                    ?>
                        <table class="table">
                        <thead>
                            <th colspan="2">RESULT</th>
                        </thead>
                        <tr>
                            <td>PRICE:</td>
                            <td><?php echo $item_price;?></td>
                        </tr>
                        <tr>
                            <td>QUANTITY:</td>
                            <td><?php echo $quantity;?></td>
                        </tr>
                        <tr>
                            <td><span class="">TOTAL:</span></td>
                            <td><?php echo number_format($cal_price,2);?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">
                                <form action="" method="POST">
                                    <input type="number" name="item_id" value="<?php echo $item_id;?>" hidden >
                                    <input type="number" name="quantity" value="<?php echo $_POST['quantity']?>" id="" hidden >
                                    <input type="number" name="item_price" value="<?php echo $_POST['item_price']?>" id="" hidden>
                                    <input type="number" name="gross" value="<?php echo number_format($cal_price,2);?>" hidden>
                                    <input type="text" name="user_id" value="<?php echo $_SESSION['user_id']?>" hidden>
                                    <input type="submit" name="order_item" value="BUY" class="btn btn-info" >
                                </form>
                            </td>
                        </tr>
                        </table>
                    <?php
                        }
                    ?>
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