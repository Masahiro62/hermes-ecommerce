<?php
  include 'datafiles.php';
?>

<!-- for user -->
<!doctype html>
<html lang="en">
  <head>
    <title>user dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/showcase.css">
    <style>
      body{
        /* background-image: url(assets/image/carts.jpg); */
        background-color: whitesmoke;
      }
      .mid
      {
        position: absolute;
        top:25%;
        left: 41%;
        
      }
    </style>
  </head>
  <body>
    <header>
      <?php include 'header.php';?>
    </header>
    <main>
        <!-- showcase -->
        <section class=""><?php include 'showcase.php';?></section>

        <div class="sticky-top w-100 text-end">
            <a href="#" class="text-dark" style="text-decoration: none;">Top<i class="fas fa-chevron-circle-up text-dark fs-1"></i><a>
            <!-- <a href="" style="text-decoration: none;">Cart<i class="fas fa-cart-plus fs-1"></i></a> -->
            
        </div>

        <!-- contents -->
        <div class="container-fluid">
              
            <div class=" w-75 mx-auto">
                <!-- <div class="" > -->
                    <!-- slider -->
                    <section class="mt-5 mb-5 " style="background-color: white;">
                      <h3 class="text-center mt-5 pt-5">COMING SOON</h3>
                      <br>
                      <table class="table w-75 mx-auto text-center">
                          <thead class="table-dark">
                                <th></th>
                                <th>ITEM NAME</th>
                                <th>PUBLISH DATE</th>
                          </thead>
                          <tbody>
                              <?php 
                                $CITEM=$personObj->comingItem();
                                if($CITEM==false){
                              ?>
                              <?php
                                }else{
                                  foreach($CITEM as $cITEM){
                                  // for pic
                                  $directory='uploads/item_pictures/';
                                  $image=$cITEM['item_image'];
                                  $src=$directory.$image;

                              ?>
                              <tr>
                                <td><img src="<?php echo $src;?>" alt="the photo of <?php echo $cITEM['item_name'];?>" style="height: 150px;"></td>
                                <td> <?php echo $cITEM['item_name'];?></td>
                                <td> <?php echo $cITEM['publish_date'];?></td>
                              </tr>
                              <?php
                                  }
                                }  
                              ?>
                          </tbody>
                      </table>
                    </section>

                    <section class=" mb-5" style="height: 500px;">
                      <article class="w-75 float-start " 
                                style="height:500px; background-image:url(assets/image/gallery.jpg); 
                                        background-position: center center; background-size: cover; background-repeat:no-repeat;">
                        <button class="btn btn-secondary" style="left: 35%; margin-top:250px; ">
                          <a href="gallery.php" class="text-white" style="text-decoration: none;">
                            EXPLORE MORE?
                          </a>
                        </button>
                      </article>

                      <article class=" float-end" style="height:500px; background-color: white; width:24%">
                          <section class="" style="height: 250px; ">
                            <h5 class="text-center mt-5 pt-5">TODAY</h5>
                            <div class="mt-3">
                            <!-- use php -->
                            <ul>
                            <?php 
                              $Eve=$personObj->todayEve();
                              
                              if($Eve==false){
                            ?>
                              <li><span class="">NO EVENTS</span></li>
                            <?php
                              }else{
                              foreach($Eve as $eve){
                                
                            ?>
                                <li>
                                  <div class="row">
                                    <div class="col-md-7"><?php echo $eve['event_title'];?></div>
                                      <div class="col-md-5">
                                      <!-- trigger modal -->
                                      <button type="button" class="btn btn-secondary border-0" data-bs-toggle="modal" data-bs-target="#event<?php echo $eve['event_id'];?>">DETAIL</button>
                                      <!-- modal -->
                                      <div class="modal fade" id="event<?php echo $eve['event_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4><?php echo $eve['event_title'];?></h4>
                                              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                            </div>
                                            <div class="modal-body">
                                              <p class="text-dark fs-5"><?php echo $eve['event_detail'];?></p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>                                 
                                  </div>
                                </li>
                            <?php
                                  }
                                }
                            ?>
                              </ul>
                            </div>
                          </section>

                          <section style="height: 250px;">
                            <h5 class="text-center">COMING SOON</h5> 
                            <div class="mt-3">
                              <ul>
                                <?php
                                $CEve=$personObj->commingEve();
                                  if($CEve==false){
                                ?>
                                    <li><span class="">NO EVENTS</span></li>
                                <?php
                                  }else{
                                  foreach($CEve as $Ceve){
                                ?>
                                <li>
                                    <div class="row mb-3">
                                      <div class="col-md-7"><?php echo $Ceve['event_date'];?><br> <?php echo $Ceve['event_title'];?></div>
                                      <div class="col-md-5">
                                        <!-- trigger modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#event<?php echo $Ceve['event_id'];?>">DETAIL</button>
                                        <!-- modal -->
                                        <div class="modal fade" id="event<?php echo $Ceve['event_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4><?php echo $Ceve['event_title'];?></h4>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <div class="modal-body">
                                                  <p class="text-dark fs-5"><?php echo $Ceve['event_detail'];?></p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </li>
                              <?php 
                                  }
                                }
                              ?>
                              </ul>
                              
                            </div>
                          </section>
                        </article>
                    </section>

                    <section class="" style="background-color: white;">
                      <h3 class="text-center pt-5">ITEM LIST</h3>
                      <table class="table table-hover w-100 mx-auto">
                        <thead class="text-center">
                          <th></th>
                          <th>ITEM NAME</th>
                          <th>CATEGORY</th>
                          <th>PRICE</th>
                          <th>STOCK</th>
                          <th>DESCRIPTION</th>
                          <th></th>
                        </thead>
                        <tbody class="text-center">
                          <?php 
                            // $displayItem=$personObj->displayItemeTable();
                            $displayItem=$personObj->publishedItem();
                            if($displayItem==false){
                          ?>
                            <td colspan="5" class="text-danger">No Record Found</td>
                          <?php
                            }else{
                            foreach($displayItem as $Item){
                                    // for pic
                                  $directory='uploads/item_pictures/';
                                  $image=$Item['item_image'];
                                  $src=$directory.$image;

                          ?>
                          <tr>
                            <td><img src="<?php echo $src;?>" alt="image of <?php echo $Item['item_name'];?>" style="height: 100px;"></td>
                            <td><?php echo $Item['item_name'];?></td>
                            <td><?php echo $Item['category_name'];?></td>
                            <td><?php echo $Item['item_price'];?></td>
                            <td><?php echo $Item['item_stocks'];?></td>
                            <td><?php echo $Item['item_description'];?></td>
                            <td class="">
                              <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info"><a href="buy_item.php?item_id=<?php echo $Item['item_id'];?>" class="text-dark" style="text-decoration: none;">BUY</a></button>
                                <!-- <button type="button" class="btn btn-outline-warning"><a href="cart_page.php" class="text-dark" style="text-decoration: none;">ADD CART</a></button> -->
                            </td>
                          </tr>
                          <?php 
                               }
                            }                          
                          ?>
                        </tbody>
                      </table>
                    </section>
                <!-- </div> -->
            </div>
        </div>
    </main>
    <footer>
        <?php include 'footer.php';?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8da6dac468.js" crossorigin="anonymous"></script>
  </body>
</html>