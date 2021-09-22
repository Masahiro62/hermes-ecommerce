<?php
    include 'datafiles.php';
    $category_id=$_GET['category_id'];
    // $displayCate=$personObj->displayCateTable();
    $displayCate=$personObj->chooseCate($category_id);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Update category</title> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
        <header><?php include 'header.php';?></header>
        <!-- back to dashboarde -->
        <a href="categories.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>

        <!-- update category -->
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
                <div class="card-header text-center">
                    <h2>UPDATE CATEGORY</h2>
                </div>
                <div class="card-body text-center">
                    <form action="" method="POST">
                        <input type="text" hidden name="category_id" value="<?php echo $displayCate['category_id'];?>">
                        <input type="text" name="u_category_name" value="<?php echo $displayCate['category_name'];?>" class="">
                        <input type="submit" name="update_category" value="UPDATE" class="btn btn-warning">
                    </form>
                </div>
            </div>
        </div>
        <footer><?php include 'footer.php';?></footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

