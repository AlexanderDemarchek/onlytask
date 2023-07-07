<?php
require("functions/sett.php");
require("functions/validate_reg.php");
require("db_connection.php");
require("functions/routing.php");

$old_user_info = save_old_info();
delete_old_info();

$user_info = fetch_reg_inf();
extract($user_info);

$validation_status = validation($firstname,$phone,$email,$passw);


if(strcmp($validation_status,'ok') == 0){
    create_profile($firstname,$phone,$email,$passw);

    include_page(["page_name" => "profile", 
                "title" => $firstname,
                "firstname" => $firstname,
                "phone" => $phone, 
                "email" => $email]);
}else{
    $firstname = $old_user_info["firstname"];
    $phone = $old_user_info["phone"];
    $email = $old_user_info["email"];
    $passw = $old_user_info["passw"];
    create_profile($firstname,$phone,$email,$passw);

    include_page(["page_name" => "profile", 
                "title" => $firstname,
                "firstname" => $firstname,
                "phone" => $phone, 
                "email" => $email,
                "err_message" => $validation_status]);
}


