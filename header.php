<?php
 session_start();
?>
          <div class="row bg-primary" style="line-height:70px;">
             <div class=" w-25 ps-5">               
                  <i class="fas fa-user text-white text-center me-1"></i><span class="text-white"><?php echo $_SESSION['username'] ;?></span>
                  <span class="text-white">/</span>
                  <i class="fas fa-door-open text-white"></i>
                  <a href="logout.php" class="text-white"><span class="text-white text-start">Logout</span></a>
             </div>

            <div class=" w-50">
              <div class="w-50 float-start text-end"><img src="assets/image/logo.png" alt="" style="height: 50px; width:50px;"></div>
              <div class="w-50 float-end"><span class=" text-white fs-2">Hermes</span></div>
            </div>
            <div class="w-25 text-center position-relative">
              <!-- nav button -->
              <nav class="mid">
                <div class="dropdown">
                  <button class="btn text-white   dropdown-toggle " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  MENU
                  </button>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item " href="profile.php?user_id=<?php echo $_SESSION['user_id'] ;?>">USER INFOMATION</a></li>
                    <li><a class="dropdown-item " href="order_history.php?user_id=<?php echo $_SESSION['user_id'] ;?>">ORDER HISTORY</a></li>
                    <li><a class="dropdown-item" href="contact.php">CONTACT</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
          <script src="https://kit.fontawesome.com/8da6dac468.js" crossorigin="anonymous"></script>

