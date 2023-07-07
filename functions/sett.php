<?php

function save_old_info(){
    global $con;

    $old_phone = $_POST["oldphone"];
    $query = "SELECT firstname,phone,email,passw FROM users WHERE phone = \"$old_phone\";";
    $old_user_info = mysqli_fetch_all(mysqli_query($con,$query), MYSQLI_ASSOC);
    $old_user_info = $old_user_info[0];

    return $old_user_info;
}

function delete_old_info(){
    global $con;
    $old_phone = $_POST["oldphone"];
    $query = "DELETE FROM users WHERE phone = \"$old_phone\";";
    mysqli_query($con, $query);
}

