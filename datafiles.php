<!-- write all if(isset) -->


<?php 

include 'classes/person.php';
$personObj= new person;

if(isset($_POST['register'])){
    //registeration
    $fullname=$_POST['fullname'];
    $address=$_POST['address'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $con_password=$_POST['con-password'];
    $staffPassword=$_POST['staffPassword'];

    if($password == $con_password){
        if($staffPassword === "123456"){
            $validateRegister=$personObj->register($username,$password,$fullname,$address,$contact_number,$email, 'A');
        }elseif(empty($staffPassword)){
            $validateRegister=$personObj->register($username,$password,$fullname,$address,$contact_number,$email, 'U');
        }
    }else{
        echo"<div class='alert alert-danger' role='alert'><strong>PASSWORD and CONFIRM PASSWORD are not the same.<br>Try it again</strong></div>";
    }

}elseif(isset($_POST['login'])){
    //login
    $username=$_POST['username'];
    $password=$_POST['password'];

    $personObj->login($username,$password);

}elseif(isset($_POST['add_category'])){
    //add category
    $category_name=$_POST['category_name'];
    $personObj->addCategory($category_name);

}elseif(isset($_POST['update_category'])){
    //update category
    $u_category_name=$_POST['u_category_name'];
    $category_id=$_GET['category_id'];

    $personObj->updateCate($u_category_name,$category_id);

}elseif(isset($_GET['operation_category'])){
    //delete category
    $category_id=$_GET['category_id'];
    $personObj->deleteCate($category_id);


}elseif(isset($_POST['add_event'])){
    //add event into db
    $event_title=$_POST['event_title'];
    $event_detail=$_POST['event_detail'];
    $event_date=$_POST['event_date'];
    
    $personObj->addEvent($event_title,$event_detail,$event_date);

}elseif(isset($_POST['edit_event'])){
    // edit and update event
    $u_event_date=$_POST['u_event_date'];
    $u_event_detail=$_POST['u_event_detail'];
    $u_event_title=$_POST['u_event_title'];
    $event_id=$_POST['event_id'];
    // var_dump($_POST);

    $personObj->editEve($u_event_title,$u_event_date,$u_event_detail,$event_id);

}elseif(isset($_GET['operation_event'])){
    // delete event 
    $event_id=$_GET['event_id'];
    $personObj->deleteEve($event_id);


}elseif(isset($_POST['add_item'])){
    //add item
    $item_name=$_POST['item_name'];
    $item_price=$_POST['item_price'];
    $item_stocks=$_POST['item_stocks'];
    $item_description=$_POST['item_description'];
    $publish_date=$_POST['publish_date'];
    $category_id=$_POST['category'];
    $item_image=$_FILES;

    $personObj->addItem($item_name,$item_description,$item_stocks,$item_price,$publish_date,$category_id,$item_image);

}elseif(isset($_GET['operation_item'])){
    // delete item
    $item_id=$_GET['item_id'];

    $personObj->deleteItem($item_id);
    
}elseif(isset($_POST['update_item'])){
    // update item
    $u_item_name=$_POST['u_item_name'];
    $u_item_description=$_POST['u_item_description'];
    $u_item_stocks=$_POST['u_item_stocks'];
    $u_item_price=$_POST['u_item_price'];
    $u_publish_date=$_POST['u_publish_date'];
    $u_category_id=$_POST['u_category_id'];
    $item_id=$_POST['item_id'];
    $file=$_FILES;

    $personObj->updateItem($u_item_name,$u_item_description,$u_item_stocks,$u_item_price,$u_publish_date,$u_category_id,$item_id,$file);

}elseif(isset($_POST['user_update'])){
    //update user info
    $user_id=$_POST['user_id'];
    $u_email=$_POST['u_email'];
    $u_fullname=$_POST['u_fullname'];
    $u_address=$_POST['u_address'];
    $u_contact_number=$_POST['u_contact_number'];
    $account_id=$_POST['account_id'];
    $u_password=$_POST['u_password'];
    $u_conpassword=$_POST['u_conpassword'];
    $u_username=$_POST['u_username'];
    var_dump($_POST);
    $personObj->upadteUserInfo($u_username,$u_password,$u_conpassword,$account_id,$u_fullname,$u_address,$u_contact_number,$u_email,$user_id);

}elseif(isset($_POST['operation_account'])){
    //delete account
    $account_id=$_POST['account_id'];
    $user_id=$_POST['user_id'];

    $personObj->deleteaccount($account_id,$user_id);

}elseif(isset($_POST['cal_item'])){
    //cal item
    // $stocks=$_POST['stock'];
    $quantity=$_POST['quantity'];
    $item_price=$_POST['item_price'];

    $personObj->calItem($quantity,$item_price);

}elseif(isset($_POST['order_item'])){
    // order & buy 
    $quantity=$_POST['quantity'];
    $item_id=$_POST['item_id'];
    $user_id=$_POST['user_id'];
    $gross=$_POST['gross'];

    $personObj->buyItem($quantity,$item_id,$user_id,$gross);

}elseif(isset($_POST['change_status'])){
    $u_status=$_POST['u_status'];
    $delivery_id=$_POST['delivery_id'];
    
    $personObj->changeStatus($u_status,$delivery_id);
}


?>