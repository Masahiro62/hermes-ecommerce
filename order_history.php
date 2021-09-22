<!doctype html>
<html lang="en">
  <head>
    <title>Order history</title>
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
      <main>
        <div class="container-fluid">
            <table class="table mt-5 mb-5 w-50 mx-auto" style="background-color: white;">
                <thead class="table-dark">
                    <th>ORDER ID</th>
                    <th></th>
                    <th>ITEM NAME</th>
                    <th>PRICE</th>
                </thead>
                <tbody>
                <?php 
                    include 'datafiles.php';
                    $user_id=$_GET['user_id'];
                    $horder=$personObj->orderHistory($user_id);
                    $directory='uploads/item_pictures/';
                    if($horder==false){
                ?>
                    <tr>
                        <td colspan="4" class="text-danger text-center">NO RECORD</td>
                    </tr>
                <?php
                    }else{
                        foreach($horder as $hor){
                            $image=$hor['item_image'];
                            $src=$directory.$image;
                ?>
                    <tr>
                        <td><?php echo $hor['order_id'];?></td>
                        <td><img src="<?php echo $src;?>" alt="the photo of <?php echo $hor['item_name'];?>" style="height: 100px;"></td>
                        <td><?php echo $hor['item_name'];?></td>
                        <td><?php echo $hor['gross'];?></td>
                    </tr>
                <?php
                        }
                    }
                ?>
                    
                    
                </tbody>
            </table>
        </div>
      </main>
      <footer><?php include 'footer.php';?></footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>