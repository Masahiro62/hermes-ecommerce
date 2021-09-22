<?php
    include 'datafiles.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Category page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

      <!-- for admin , category page -->
      <header><?php include 'header.php';?></header>
      
      <!-- back to dashboarde -->
      <a href="adminDashboard.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>

      <main>
        <div class="conutainer-fluid">
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
            <!-- add category -->
            <form action="" method="POST">
                <div class="form-group pt-5 pb-3 text-center">
                    <label for="">Add Category:</label>
                    <input type="text" name="category_name" class="form-group">
                    <input type="submit" name="add_category" value="ADD" class="btn btn-success">
                </div>
            </form>

            <!-- category table -->
            <hr class="w-50 mx-auto">
                <h3 class="text-center">Category Table</h3>
                <table class="table table-hover w-50 mx-auto">
                    <thead class=" table-dark">
                        <th class="text-center">NAME</th>
                        <th colspan="2"></th>
                    </thead>

                    <tbody>
                        <?php 
                            $displayCate=$personObj->displayCateTable();
                            if($displayCate==false){
                        ?>

                            <td colspan="4" class="text-danger">No Record Found</td>
                        <?php 
                            }else{
                                foreach($displayCate as $Cate){
                                           
                        ?>
                        <tr class="">
                            <td class="text-center"><?php echo $Cate['category_name'];?></td>
                            <td class="text-end"><a href="update_category.php?category_id=<?php echo $Cate['category_id'];?>" class="btn btn-warning">UPDATE</a></td>
                            <td>
                                <!-- button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?php echo $Cate['category_id'];?>_category">
                                    DELETE
                                </button>

                                <!-- modal-->
                                <div class="modal fade" id="modal<?php echo $Cate['category_id'];?>_category" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">DELETE</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" value="">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <P class="text-center">Are you sure to delete " <strong><?php echo $Cate['category_name'];?> </strong>" ?</P>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="" method="GET">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="number" hidden name="category_id" hidden value="<?php echo $Cate['category_id'];?>">
                                                    <input type="submit" name="operation_category" value="DELETE" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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