<?php

    $conn = mysqli_connect('localhost','','','');


/*
* User management
*/

function check_user_existence($username){
    global $conn;
    
    $sql = "select * from Users_tarot where Users = '$username'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
    else {
        return false;
    }
    
}

function check_user_account($username, $password){
    
    global $conn;
    
    $sql = "select * from Users_tarot where Users = '$username' and Password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }
    else{
        return false;
    }
}

function make_new_account($username, $password, $email){
    global $conn;
    
    if(check_user_existence($username)){
        return false;
    }
    
    $sql = "insert into Users_tarot values (NULL, '$username', '$password', '$email')";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function forgotpassword($username, $email, $password)
{
    global $conn;
    $sql = "update Users_tarot set Password = '$password' where Users = '$username' and Email = '$email'";

    $result = mysqli_query($conn, $sql);
}

/*Entering the user details*/

function check_user_profile_details($username)
{
    global $conn;
    //echo 'checked username';
    $sql = "select * from user_profile_details where Username = '$username'";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
    else{
        return false;
    }
}

function insert_user_details($username, $fullname, $dob, $gender, $email, $contact, $address){
    global $conn;
    if(check_user_profile_details($username)){
        $sql = "update user_profile_details SET Username = '$username', Fullname = '$fullname', Dob = '$dob', Gender = '$gender', Email = '$email', Contact_no = '$contact', Address =  '$address' where Username = '$username'";
        
        $sql1 = "update Users_Appointment set Contact_no = '$contact' where Username = '$username'";
        $result1 = mysqli_query($conn, $sql1);
    }else{
        $sql = "insert into user_profile_details values(NULL, '$username', '$fullname', '$dob', '$gender', '$email', '$contact', '$address')";
    }
    
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

function delete_user_profile($username){
    global $conn;
    
    $sql = "Delete from Users_tarot where Users like '$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $sql = "delete from user_profile_details where Username Like '$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $sql = "delete from Users_Appointment where Username Like '$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $sql = "delete from User_Products where Username Like '$username'";
    
    $result = mysqli_query($conn, $sql);
}

function fetch_user_details($username){
    global $conn;
    
    $data = [];
    $sql = "Select * from user_profile_details where Username = '$username'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $data[] = [$row['Fullname'], $row['Dob'], $row['Gender'], $row['Email'], $row['Contact_no'], $row['Address']];
    }
    return $data;
}

function fetch_user_contact($username){
    global $conn;
    
    $data = [];
    $sql = "Select * from user_profile_details where Username = '$username'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $data[] = [$row['Contact_no']];
    }
    return $data;
}

/*  functions performed in appointment page*/

function make_an_appointment($username, $name, $apptType, $contact, $date, $time){
    global $conn;
    
    $sql = "insert into Users_Appointment values(NULL, '$username', '$name', '$apptType', '$contact', '$date', '$time')";
    
    $result = mysqli_query($conn, $sql);
    return $result;
}

function get_appointment_list($user, $contact){
    global $conn;
    
    $sql = "Select * from Users_Appointment where Username =  '$user' and Contact_no = '$contact'";
    
    $result = mysqli_query($conn, $sql);
    
    $appointment_data = [];
    while($row = mysqli_fetch_assoc($result)){
        $appointment_data[] = [$row['Id'], $row['Name'],$row['Appointment_type'],  $row['Contact_no'], $row['Appointment_date'], $row['Appointment_time']];
    }
    return $appointment_data;
}

function delete_appointment($appointmentId){
    global $conn;
    
    $sql = "Delete from Users_Appointment where Id = '$appointmentId'";
    
    $result = mysqli_query($conn, $sql);
}

/* function performed in feedback page*/

function insert_feedback($username, $name, $message){
    $currentdate = date("Y-m-d");
    date_default_timezone_set("America/Vancouver");
    $currenttime = date("h:i a");
    
    global $conn;
    
    //echo $currentdate. "says ". $currenttime;
    $sql = "insert into Users_Feedback     values(NULL, '$username', '$name', '$message', '$currentdate', '$currenttime')";
    
    $result = mysqli_query($conn, $sql);
    echo $result. "   ";
    return $result;
}

function get_feedbacks(){
    global $conn;
    
    $sql = "Select * from Users_Feedback";
    
    $result = mysqli_query($conn, $sql);
    
    $data = [];
    
    while($row = mysqli_fetch_assoc($result)){
        $data[] = [$row['Name'], $row['Feedback'], $row['Date'], $row['Time']];
    }
    
    return $data;
}

/*shopping products functions*/

function showProducts(){
    global $conn;
    
    $sql = "Select * from Tarot_products";
    
    $result = mysqli_query($conn, $sql);
    
    $data = [];
    
    while($row = mysqli_fetch_assoc($result)){
        $data[] = [$row['Id'], $row['Image'], $row['Name'], $row['description'], $row['Price']];
    }
    
    return $data;
}

function addtoCart($username, $productId){
    global $conn;
    
    $sql = "Select * from Tarot_products where Id = '$productId'";
    
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $image = $row['Image'];
    $name = $row['Name'];
    $price = $row['Price'];
    $sql_i = "insert into User_Products values(NULL, '$username', '$productId','$image', '$name', '$price')";
    
    $result1 = mysqli_query($conn, $sql_i);
    return $result1;
    
    
}

function showmyCart($username){
    global $conn;
    
    $sql = "select *, count(*) as quantity from User_Products where Username = '$username' group by Product_id order by quantity DESC";
    
    $sql1 = "select round(sum(Product_price),2) as cost from User_Products where Username = '$username'";
    
    $result1 = mysqli_query($conn, $sql1);
    
    $result = mysqli_query($conn, $sql);
    
    $data = [];
    $arr = [];
    $cost = [];
    while($row1 = mysqli_fetch_assoc($result1)){
        $cost[] = [$row1['cost']];
    }
    while($row = mysqli_fetch_assoc($result)){
        $data[] = [$row['Product_image'], $row['Product_name'], $row['quantity'], $row['Product_price'], $row['Product_id']];
    }
    $arr[] = [$cost,$data];
    return $arr;
}

function removefromcart($username, $productId){
    global $conn;
    
    $sql = "delete from User_Products where Username = '$username' and Product_id = '$productId' limit 1";
    
    $result = mysqli_query($conn, $sql);
}

function userpayment($username){
    global $conn;
    
    $sql1 = "Select Fullname, Email, Contact_no, Address from user_profile_details where Username = '$username'";
    
    $sql2 = "Select round(sum(Product_price),2) as cost from User_Products where Username = '$username'";
    
    $result = mysqli_query($conn, $sql1);
    $result1 = mysqli_query($conn, $sql2);
    
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = [$row["Fullname"], $row["Email"], $row["Contact_no"], $row["Address"]];
    }
    $row1 = mysqli_fetch_assoc($result1);
    $data[] = [$row1['cost']];
    return $data;
}

function emptyCart($username){
    global $conn;
    
    $sql = "Delete from User_Products where Username = '$username'";
    
    $result = mysqli_query($conn, $sql);
}

?>
