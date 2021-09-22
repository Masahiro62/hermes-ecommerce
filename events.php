<?php 
    include 'datafiles.php';
    //$displayEve=$personObj->chooseEve($event_id);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Event page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <header><?php include 'header.php'?></header>
        <!-- back to dashboarde -->
        <a href="adminDashboard.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>
      <main>
      <!-- add event -->
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
            <div class="card w-50 mx-auto mt-5">
                <div class="card-header">
                    <h3 class="text-center">EVENTS</h3>
                </div>
                <form action="" method="POST" class="">
                    <div class="card-body">
                        <label for="">TITLE:</label>
                        <input type="text" name="event_title" class="form-control w-100">
                        <label for="" class="mt-2">DATE:</label>
                        <input type="date" name="event_date" id="" class="form-control">
                        <label for="" class="mt-2">DETAIL:</label>
                        <textarea name="event_detail" class="w-100" id="" cols="30" rows="10" maxlength="255" placeholder="EX) We will have the event on this weekend...etc"></textarea>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" name="add_event" value="ADD" class="btn btn-primary w-75">
                    </div>
                </form>
            </div>
            <hr class="w-50 mx-auto mt-5">
            <!-- event table -->
            <section class="mt-3">
                <h3 class="text-center">EVENT LIST</h3>
                <table class="table table-hover w-100 mx-auto"> 
                    <thead class="table-dark">
                            <!-- <th>ID</th> -->
                            <th>DATE</th>
                            <th>TITLE</th>
                            <th>DETAIL</th>
                            <th colspan="2"></th>
                    </thead>
                    <tbody>
                        <?php
                            $displayEvent=$personObj->dispalyEventsTable();
                            if($displayEvent==false){
                        ?>
                        <td colspan="5" class="text-danger">No Record Found</td>
                        <?php
                            }else{
                                foreach($displayEvent as $Eve){
                        ?>
                        <tr>
                            <!-- <td><?php echo $Eve['event_id']?></td> -->
                            <td><?php echo $Eve['event_date'];?></td>
                            <td><?php echo $Eve['event_title'];?></td>
                            <td><?php echo $Eve['event_detail'];?></td>
                            <td><a href="edit_event.php?event_id=<?php echo $Eve['event_id'];?>" class="btn btn-success ps-4 pe-4">EDIT</a></td>
                            <td>
                                    <!-- button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?php echo $Eve['event_id'];?>_event">
                                        DELETE
                                    </button>
                                    
                                    <!-- modal -->
                                    <div class="modal fade" id="modal<?php echo $Eve['event_id'];?>_event" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">DELETE</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" value="">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <P class="text-center">Are you sure to delete " <strong><?php echo $Eve['event_title'];?> </strong>" ?</P>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="GET">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="number" hidden name="event_id" hidden value="<?php echo $Eve['event_id'];?>">
                                                        <input type="submit" name="operation_event" value="DELETE" class="btn btn-danger">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table >
            </section>
        </div>
      </main>
      <footer><?php include 'footer.php';?></footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>