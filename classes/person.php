<?php

include 'config.php';

class  person extends config{

    // registeration part
    public function register($username,$password,$fullname,$address,$contact_number,$email, $status){
        $hash_password= password_hash($password,PASSWORD_DEFAULT);

        // check if username already exsit
        $check_username="SELECT * FROM `accounts` WHERE `username` = '$username'";
        $result_check=$this->conn->query($check_username);

        // if the condition evaluates to true, username already exsist
        if($result_check->num_rows>0){
            header('Location:register.php?success=0&message=Username already taken.');

        }else{
            $sql_accounts ="INSERT INTO `accounts`( `username`, `password`) VALUES ('$username','$hash_password')";
            $result_accouts=$this->conn->query($sql_accounts);

            if($result_accouts==TRUE){
                $account_id = $this->conn->insert_id;
                $sql_users="INSERT INTO `users`(`fullname`, `address`, `contact_number`, `email`, `status`, `account_id` ) VALUES ('$fullname','$address','$contact_number','$email', '$status', '$account_id')";
                $result_users=$this->conn->query($sql_users);

                if($result_users==TRUE){
                    header('location:register.php?success=1&message=You successfully registered.');
                }else{
                    header('location:register.php?success=0&message=An error occured. Kindly try again.');
                }
            }else{
                header('location:register.php?success=0&message=An error occured. Kindly try again.');
            }
        }      
    }

    // login part
    public function login($username,$password){
        session_start();
        $sql="SELECT * FROM users INNER JOIN accounts ON users.account_id=accounts.account_id WHERE accounts.username='$username'";
        $result=$this->conn->query($sql);

        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            if(password_verify($password,$row['password'])){
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['password']=$row['password'];
                $_SESSION['username']=$row['username'];
                $_SESSION['account_id']=$row['account_id'];
                if($row['status']=='U'){
                    header("location:userDashboard.php");
                }else{
                    header("location:adminDashboard.php");
                }
            }else{
                header('location:login.php?success=0&message=Incorrect password. Kindly try again.');
            }

        }else{
            header("location:login.php?success=0&message=Incorrect username or password. Kindly try again.");
        }
    }

    // add category into db
    public function addCategory($category_name){

        $check_sql="SELECT * FROM categories WHERE category_name='$category_name'";
        $result_check=$this->conn->query($check_sql);

        if($result_check->num_rows>0){
            header("location:categories.php?success=0&message=The Category name is already in the table.");
        }elseif(!empty($category_name)){
            $sql="INSERT INTO categories (`category_name`)VALUES('$category_name')";
            $result=$this->conn->query($sql);

            if($result==TRUE){
                header("location:categories.php?success=1&message=The category was successfuly created");
            }else{
                header("location:categories.php?success=0&message=Kindly try it again.");
            }
        }
    }

        // fetch the categorty info and display
    public function displayCateTable(){
        $sql="SELECT * FROM categories ORDER BY `category_name`";
        $result=$this->conn->query($sql);
        $rows=array();
        
        if($result->num_rows>0){
            while($displayCate=$result->fetch_assoc()){
                array_push($rows,$displayCate);
            }
            return $rows;
        }else{
            return false;
        }
    }

        // choose specific category_id
    public function chooseCate($category_id){
        $sql="SELECT * FROM categories WHERE category_id= '$category_id'";
        $result=$this->conn->query($sql);

        if($result==TRUE){
            return $result->fetch_assoc();
            
        }
    }

    public function updateCate($u_category_name,$category_id){
        $check_sql="SELECT * FROM categories WHERE category_name='$u_category_name'";
        $result_check=$this->conn->query($check_sql);
        // check if there is the name already or not 
        if($result_check->num_rows>0){
            header("location:update_category.php?category_id=$category_id&success=0&message=The item is already in the table.");

        }else{
            $sql="UPDATE categories SET `category_name`='$u_category_name' WHERE `category_id`='$category_id' ";
            $result_sql=$this->conn->query($sql);

            if($result_sql==TRUE){
                header("location:update_category.php?category_id=$category_id&success=1&message=The category successfully updated");

            }else{
                header("location:update_category.php?category_id=$category_id&success=0&message=Error occurd.Try it again.");

            }
        }

    }

    // delete categpry
    public function deleteCate($category_id){
        $sql="DELETE FROM categories WHERE category_id='$category_id'";

        if($this->conn->query($sql)){
            header("location:categories.php?success=1&message=The record was successfully deleted");
        }else{
            header("location:categories.php?success=0&message=Kindly try it again.");

        }
    }


    // add item into db
    public function addItem($item_name,$item_description,$item_stocks,$item_price,$publish_date,$category_id,$file){

        // check the data 
        $check_sql="SELECT * FROM items WHERE item_name='$item_name'";
        $result_check=$this->conn->query($check_sql);

        if($result_check->num_rows>0){
            header('location:items.php?success=0$message=The item is already in the table');

        }else{
            if($_FILES['item_image']['tmp_name']==NULL){
                $sql_insertText="INSERT INTO `items`(`item_name`, `item_description`, `item_stocks`, `item_price`, `publish_date`, `category_id`,`item_image`) VALUES ('$item_name','$item_description','$item_stocks','$item_price','$publish_date','$category_id','no_image.jpg')";
                $result_insertText=$this->conn->query($sql_insertText);

                if($result_insertText==true){
                    header('location:items.php?success=1&message=The item was successfuly created');

                }else{
                    header('location:items.php?success=0&message= Error Occourd.Try it again');
                }
                
            }else{
                //check the pic type /size...etc
                $error=0;
                $error_message="";

                $fileType=strtolower(pathinfo($file['item_image']['name'],PATHINFO_EXTENSION));
                $fileName=date('m-d-y h:i:s a',time()).".".$fileType;
                $target_directory="uploads/item_pictures/";
                $target_file=$target_directory.$fileName;
            
                //check if the file is an actual image
                $imageSize=getimagesize($file['item_image']['tmp_name']);

                if($imageSize==false){
                    $error=1;
                    $error_message="The File is not image";

                }elseif($error==0){

                    //check file size (e.g No images will accepted)
                    if($file["item_image"]["size"]>50000000){
                        $error=1;
                        $error_message="Image is too big";

                    }else{
                        //upload and move to the our uploads/
                        move_uploaded_file($file['item_image']['tmp_name'],$target_file);

                        //update db pic and item info
                        $sql="INSERT INTO `items`(`item_name`, `item_description`, `item_stocks`, `item_price`, `publish_date`,`category_id`,`item_image`) VALUES ('$item_name','$item_description','$item_stocks','$item_price','$publish_date','$category_id','$fileName')";
                        $result=$this->conn->query($sql);

                        //display message success or error 
                        if($result==TRUE){
                            header("location:items.php?success=1&message=The item was successfully created");

                        }else{
                            header("location:items.php?success=0&message=Error occurd.Try it again.");
                        }
                    }
                }else{
                    header("location:items.php?success=0&message=$error_message");
                }
            }
        }
    }

    //display item table
    public function displayItemeTable(){
        $sql="SELECT * FROM `items` INNER JOIN `categories` ON items.category_id=categories.category_id ORDER BY category_name";
        // want to sort by category_name but not working
        $result=$this->conn->query($sql);
        $rows=array();
        
        if($result->num_rows>0){
            while($displayItem=$result->fetch_assoc()){
                array_push($rows,$displayItem);
            }
            return $rows;
        }else{
            return false;
        }
    }
    // choose specific item
    public function specificItem($item_id){
        $sql="SELECT * FROM items INNER JOIN categories ON items.category_id=categories.category_id WHERE item_id ='$item_id'";
        $result=$this->conn->query($sql);

        if($result==TRUE){
            return $result->fetch_assoc();
            
        }
    }

    //update item
    public function updateItem($u_item_name,$u_item_description,$u_item_stocks,$u_item_price,$u_publish_date,$u_category_id,$item_id,$file){
        
        if($_FILES['u_item_image']['tmp_name']==NULL){
            //update only text
            $sql_updateWithoutpic="UPDATE `items` SET 
                                    `item_name`='$u_item_name',`item_description`='$u_item_description',`item_stocks`='$u_item_stocks',`item_price`='$u_item_price',`publish_date`='$u_publish_date',`category_id`='$u_category_id' 
                                    WHERE item_id='$item_id'";
            $result_updateWithout=$this->conn->query($sql_updateWithoutpic);

            if($result_updateWithout==true){
                header("location:update_item.php?item_id=$item_id&success=1&message=The recoprd was successfuly updated");

            }else{
                header("location:update_item.php?item_id=$item_id&success=0&message= Error occurd.Try it again");
            }

        }else{
            // before update with pic 
            // check the pic 
            $error=0;
            $error_message="";

            $fileType=strtolower(pathinfo($file['u_item_image']['name'],PATHINFO_EXTENSION));
            $fileName=date('m-d-y h:i:s a',time()).".".$fileType;
            $target_directory="uploads/item_pictures/";
            $target_file=$target_directory.$fileName;

            //check the file is an actual image
            $imageSize=getimagesize($file['u_item_image']['tmp_name']);

            if($imageSize==false){
                $error=1;
                $error_message="The File is not image";

            }elseif($error==0){
                //check file size (e.g No images will accepted)
                if($file["u_item_image"]["size"]>50000000){
                    $error=1;
                    $error_message="Image is too big";

                }else{
                    // upload and move to the our uploads/
                    move_uploaded_file($file['u_item_image']['tmp_name'],$target_file);
                    
                    //update db
                    $sql_updatewithPic="UPDATE `items` SET 
                    `item_name`='$u_item_name',`item_description`='$u_item_description',`item_stocks`='$u_item_stocks',`item_price`='$u_item_price',`publish_date`='$u_publish_date',`category_id`='$u_category_id', 
                    `item_image`='$fileName' WHERE item_id='$item_id'";
                    $result_withPic=$this->conn->query($sql_updatewithPic);

                    // dispaly message success or error 
                    if($result_withPic==true){
                        header("location:update_item.php?item_id=$item_id&success=1&message=The item was successfully updated");

                    }else{
                        header("location:update_item.php?item_id=$item_id&success=0&message=Error occurd.Try it again.");                        
                    }
                }
            }else{
                header("location:items.php?success=0&message=$error_message");

            }
        }
    }

    //delete item
    public function deleteItem($item_id){
        $sql="DELETE FROM items WHERE item_id='$item_id'";
        $result=$this->conn->query($sql);

        if($result==true){
            header("location:items.php?success=1&message=The record was successfully deleted");

        }else{
            header("location:items.php?success=0&message=Error occurd.Try it again");

        }
    }


    // EVENT
    // add event into db
    public function addEvent($event_title,$event_detail,$event_date){

        // check the name of the event on db
        // $check_sql="SELECT*FROM `events` WHERE event_title='$event_title'";
        // $result_check=$this->conn->query($check_sql);

        // if($result_check->num_rows>0){
        //     echo "<div class='alert alert-danger text-center'>The event is already in the table.</div>";

        // }else{
            // insert into db
            $sql="INSERT INTO `events`(`event_title`,`event_detail`,`event_date`) VALUES('$event_title','$event_detail','$event_date')";
            $result=$this->conn->query($sql);

            if($result==TRUE){
            header("location:events.php?success=1&message=The event was successfully created");
            }else{
                header("location:events.php?success=0&message=Error occurd.Try it again.");
            // }   
        }
    }

    //check the specific event_id
    public function chooseEve($event_id){
        $sql="SELECT * FROM events WHERE event_id='$event_id'";
        $result=$this->conn->query($sql);
        if($result==true){
            return $result->fetch_assoc();
        }
    }

    // edit and update the event
    public function editEve($u_event_title,$u_event_date,$u_event_detail,$event_id){
        //check if it is same event or not
        // $check_sql="SELECT * FROM `events` WHERE `event_name`='$u_event_title'";
        // $result_check=$this->conn->query($check_sql);

        // if($result_check->num_rows>0){
        //     echo "<div class='alert alert-danger text-center'>The event is already in the table.</div>";

        // }else{
            // update the data
            $sql="UPDATE `events` SET `event_title`='$u_event_title',`event_detail`='$u_event_detail',`event_date`='$u_event_date' WHERE `event_id`='$event_id'";
            $result=$this->conn->query($sql);

            if($result==true){
                header("location:edit_event.php?event_id=$event_id&success=1&message=The event was successfully modified");

            }else{
                header("location:edit_event.php?event_id=$event_id&success=0&message=Error occurd.Try it again.");

            }
        // }
    }

    // fetch the events info and display
    public function dispalyEventsTable(){
        $sql="SELECT * FROM `events` ORDER BY `event_date` asc";
        $result=$this->conn->query($sql);
        $rows=array();

        if($result->num_rows>0){
            while($displayEvent=$result->fetch_assoc()){
                $rows[]=$displayEvent;
            }
            return $rows;
        }else{
            return false;
        }

    }

    public function todayEve(){
        $today=date('Y-m-d');
        $sql="SELECT * FROM `events` WHERE `event_date`='$today'";
        $result=$this->conn->query($sql);
        $records=array();

         if($result->num_rows>0){
            while($row = $result->fetch_assoc())
            {
                array_push($records,$row);
            } 
                return $records;
        }else{
            return false;
        }

    }

    public function commingEve(){
        $today= date('Y-m-d');
        $soon=date("Y-m-d",strtotime('+3 day')) ;
        $sql="SELECT * FROM `events` WHERE '$today' < `event_date` AND `event_date`<'$soon'";
        $result=$this->conn->query($sql);
        $records=array();
            // var_dump($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($records,$row);
            }
            return $records;
        }else{
            return false;
        }
    }

    //delete the event
    public function deleteEve($event_id){
        $sql="DELETE FROM `events` WHERE event_id = '$event_id'";

        if($this->conn->query($sql)){
            header("location:events.php?success=1&message=The record was successfully deleted");
        }else{
            header("location:events.php?success=0&message=Error occurd.Try it again.");
        }
    }


    // fetch the deliveries info from db
    public function displayDeliveryTable(){
        $sql="SELECT * FROM `deliveries`
                INNER JOIN `users` ON deliveries.user_id=users.user_id
                INNER JOIN `accounts`ON users.account_id=accounts.account_id";
        $result=$this->conn->query($sql);
        $rows=array();

        if($result->num_rows>0){
            while($displayDeli=$result->fetch_assoc()){
                $rows[]=$displayDeli;
            }
            return $rows;
        }else{
            return false;
        }
    }
    //change the delivery status
    public function changeStatus($u_status,$delivery_id){
        $sql="UPDATE  `deliveries` SET `delivery_status`='$u_status' WHERE delivery_id='$delivery_id'";
        $result=$this->conn->query($sql);
        if($result==true){
            header("location:delivery.php?success=1&message=You successfully updated the status.");
        }else{
            header("location:delivery.php?success=0&message=Error occured in delivery table. Try it agin.");
        }
    }

    //fetch the orders info from db
    public function displayOrderTable(){
        $sql="SELECT * FROM `orders` 
                INNER JOIN `items` ON orders.item_id=items.item_id
                INNER JOIN `users` ON orders.user_id=users.user_id
                INNER JOIN `accounts`ON users.account_id=accounts.account_id";
                
        $result=$this->conn->query($sql);
        $records=array();

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                array_push($records,$row);
            }
            return $records;
        }else{
            return false;
        }
    }
    // show the history of the orders
    public function orderHistory($user_id){
        $sql="SELECT * FROM `orders`
                INNER JOIN `items` ON orders.item_id=items.item_id WHERE `user_id`='$user_id'";
        $result=$this->conn->query($sql);
        // var_dump($sql);
        // var_dump($result);
        if($result->num_rows>0){
            while($displayHistory=$result->fetch_assoc()){
                $rows[]=$displayHistory;
            }
            return $rows;
        }else{
            return false;
        }
    }

    //buy item page 
    // calculate the price
    public function calItem($quantity,$item_price){
        $cal_price=$quantity*$item_price;
        return $cal_price;
    }
    //buy the item
    public function buyItem($buy_item,$item_id,$user_id,$gross){
        // for updating the rest of the item 
        $sql="UPDATE items 
                SET item_stocks = item_stocks - $buy_item
                WHERE item_id ='$item_id'";
        $result=$this->conn->query($sql);
        if($result==true){
            // insert into delivery table
            $insert_delivery="INSERT INTO `deliveries`(`user_id`)VALUES('$user_id')";
            $result_delivery=$this->conn->query($insert_delivery);


            if($result_delivery==true){
                $delivery_id = $this->conn->insert_id;
                $create_order="INSERT INTO `orders`(`item_id`,`user_id`,`delivery_id`,`gross`)VALUES('$item_id','$user_id','$delivery_id','$gross')";
                $result_order=$this->conn->query($create_order);
                // var_dump($create_order);
                if($result_order==true){
                    header("location:buy_item.php?item_id=$item_id&success=1&message=You successfully ordered");
                }else{
                    header("location:buy_item.php?item_id=$item_id&success=0&message=An error occured. Kindly try again.");
                }
            }else{
                header("location:buy_item.php?item_id=$item_id&success=0&message=An error occured. Kindly try again.");
            }

        }else{
            header("location:buy_item.php?item_id=$item_id&success=0&message=Error occured in delivery table. Try it agin");
        }
    }


    // cart page 



    // profile 
    // display the info
    public function getUserInfo($user_id){
        $sql="SELECT * FROM `users` INNER JOIN `accounts` ON users.account_id=accounts.account_id WHERE user_id='$user_id'";
        $result=$this->conn->query($sql);

        if($result==true){
            return $result->fetch_assoc();
        }
    }

    // update info
    public function upadteUserInfo($u_username,$u_password,$u_conpassword,$account_id,$u_fullname,$u_address,$u_contact_number,$u_email,$user_id){

        // check the passwords   
            
            $check_password="SELECT * FROM `accounts` WHERE account_id ='$account_id'";
            $result_check=$this->conn->query($check_password);
            if($result_check->num_rows==1){
                $row=$result_check->fetch_assoc();

                if(password_verify($u_password,$row['password']) && $u_password==$u_conpassword){
                    $update_account="UPDATE `accounts` SET `username`='$u_username' WHERE account_id ='$account_id'";
                    $result_update_account=$this->conn->query($update_account);

                    if($result_update_account==true){
                    //update user table
                    $update_user="UPDATE users SET `fullname`='$u_fullname',`address`='$u_address',`contact_number`='$u_contact_number',`email`='$u_email' WHERE `user_id`= '$user_id'";
                    $result_update_user= $this->conn->query($update_user);
                        if($result_update_user==true){
                            header("location:profile.php?user_id=$user_id&success=1&message=You successful updated");
                        }
                    }else{
                    header("location:profile.php?user_id=$user_id&success=0&message=Error occured. Try it again");
                    }
                }else{
                    header("location:profile.php?user_id=$user_id&success=0&message=Your password is different. Try it again");
                }
            }
    }

    // delete account
    // user->accout
    public function deleteaccount($account_id,$user_id){
        $sql="DELETE FROM users WHERE user_id='$user_id'";
        $result=$this->conn->query($sql);

        if($result==true){

            $delete_account="DELETE FROM accounts WHERE account_id='$account_id'";
            $result_user=$this->conn->query($delete_account);

            if($result_user==true){
                header("location:index.php");
            }

        }else{
            header('location:profile.php?success=0&message=An error occured. Kindly try again.');

        }
    }

    //slideshow/table on userdash 
    public function comingItem(){
        $today=date('Y-m-d');
        $soon=date('Y-m-d',strtotime('+7 days'));
        $sql="SELECT * FROM `items` WHERE '$today'<`publish_date` AND `publish_date`<'$soon'";
        $result=$this->conn->query($sql);
        $records=array();

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                array_push($records,$row);
            }
            return $records;
        }else{
            return false;
        }  
    }

    // display item table just >today 
    public function publishedItem(){
        $tommorow=date('Y-m-d',strtotime('+1 day'));
        $sql="SELECT * FROM `items` 
                INNER JOIN `categories` ON items.category_id=categories.category_id WHERE `publish_date`<'$tommorow'";
        $result=$this->conn->query($sql);
        $records=array();

        if($result->num_rows>0){
            while($rows=$result->fetch_assoc()){
                array_push($records,$rows);

            }
            return $records;
        }else{
            return false;
        }
        
    }
 }

?>


