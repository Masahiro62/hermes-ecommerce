<?php
    include 'datafiles.php';
    $event_id=$_GET['event_id'];
    $displayEvent=$personObj->chooseEve($event_id);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Event</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <header><?php include 'header.php';?></header>
        <!-- back to dashboarde -->
        <a href="events.php"><i class="fas fa-angle-double-left display-4 mt-3"></i></a>
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
                <div class="card-header text-center">
                    <h2>EDIT EVENT</h2>
                </div>
                <div class="card-body">
                <form action="datafiles.php" method="post">
                    <input type="hidden" name="event_id" value="<?php echo $displayEvent['event_id']?>">
                    <label for="">TITLE:</label>
                    <input type="text" name="u_event_title" value="<?php echo $displayEvent['event_title']?>" class="form-control w-100">
                    <label for="">DATE:</label>
                    <input type="date" name="u_event_date" value="<?php echo $displayEvent['event_date']?>" class="form-control w-100">
                    <label for="">DETAIL:</label>
                    <textarea name="u_event_detail" id="" cols="30" rows="10" maxlength="255" class="form-control w-100"><?php echo $displayEvent['event_detail']?></textarea>
                    <div class="text-center form-group">
                        <input type="submit" name="edit_event" value="UPDATE" class="btn btn-warning form-control w-50">
                    </div>
                </form>
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