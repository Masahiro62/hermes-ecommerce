<?php
    include 'datafiles.php';
    $item_id=$_GET['item_id'];
    $Item=$personObj->specificItem($item_id);

    // for pic
    $directory='uploads/item_pictures/';
    $image=$Item['item_image'];
    $src=$directory.$image;
    
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Update Item</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <header><?php include 'header.php';?></header>
        <!-- back to dashboarde -->
        <a href="items.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>

      <main class="mt-3 mb-3">
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
            <section class="w-50 float-start ">
                <div class="card w-75 mx-auto">
                    <div class="card-header border border-0 bg-white">
                        <h3 class="text-center mt-3">ITEM IMAGE</h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="<?php echo $src;?>" alt="" class="img-fluid" style="height: 455px;">
                    </div>
                </div>
               
            </section>
            <div class="card w-50">
                <div class="card-header text-center">
                    <h2>UPDATE ITEM</h2>
                </div>
                <div class=" ">
                    <table class="table w-75 mx-auto">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- <thead class="table-dark">
                                <th colspan="2" class="text-center fs-4">Add Item</th>
                            </thead> -->
                            <tbody>
                                <tr>
                                    <td>NAME:</td>
                                    <td><input type="text" name="u_item_name" value="<?php echo $Item['item_name'];?>" id="" class="form-control"　></td>
                                </tr>
                                <tr>
                                    <td>CATEGORY:</td>
                                    <td>
                                        <select name="u_category_id" id="category" class="form-control">
                                            <?php 
                                                    $selectCate=$personObj->displayCateTable();
                                                    if($selectCate==false){
                                                ?>
                                                    <option value="" class="text-danger">NO RECORD</option>
                                                <?php
                                                    }else{
                                                        foreach($selectCate as $scate)
                                                        {
                                                            if($scate['category_id']==$Item["category_id"])
                                                            {
                                                ?>
                                                    <option value="<?php echo $scate['category_id'];?>" selected><?php echo $scate['category_name'];?></option>
                                                <?php 
                                                            }
                                                            else
                                                            {
                                                ?>
                                                    <option value="<?php echo $scate['category_id'];?>" ><?php echo $scate['category_name'];?></option>
                                                <?php                
                                                            }
                                                        }
                                                }
                                                ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PRICE:</td>
                                    <td><input type="number" name="u_item_price" value="<?php echo $Item['item_price'];?>" id="" class="form-control" step="any"></td>
                                </tr>
                                <tr>
                                    <td>STOCK:</td>
                                    <td><input type="number" name="u_item_stocks" value="<?php echo $Item['item_stocks'];?>" id="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>PUBLISH DATE:</td>
                                    <td><input type="date" name="u_publish_date" value="<?php echo $Item['publish_date'];?>" id="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>DESCRIPTION:</td>
                                    <td>
                                        <textarea name="u_item_description" id="" value="<?php echo $Item['item_description'];?>" cols="30" rows="10" maxlength="255" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ITEM IMAGE</td>
                                    <td><input type="file" name="u_item_image" id="" class="form-control" accept="image/png,image/jpeg,image/jpg"></td>
                                </tr>
                                <tr class="">
                                    <input type="text" hidden name='item_id' value="<?php echo $Item['item_id'];?>">
                                    <td colspan="2" class="text-center"><input type="submit" value="UPDATE" name="update_item" class="btn btn-warning w-50 mt-3"></td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
            
        </div>
      </main>
      <footer><?php include 'footer.php';?></footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>